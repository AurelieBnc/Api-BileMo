<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class CustomerController extends AbstractController
{
    /**
     * @param CustomerRepository $customerRepository
     * @param SerializerInterface $serializer
     * @param Request $request
     * @return JsonResponse
     */
    #[Route('/api/customers', name: 'customers', methods: ['GET'])]
    #[IsGranted('CUSTOMER_LIST')]
    public function getCustomerList(CustomerRepository $customerRepository, SerializerInterface $serializer,  Request $request): JsonResponse
    {
        try{
            $page = $request->get('page', 1);
            $limit = $request->get('limit', 5);

            $user = $this->getUser();
            if ($user) {
                $customerList = $customerRepository->findAllWithPaginationByUser($page, $limit, $user);
            }            
        } catch(AccessDeniedException $e) {
            error_log($e->getMessage());
            }

        $context = SerializationContext::create()->setGroups(['groups' => 'getCustomers']);
        $jsonCustomerList = $serializer->serialize($customerList, 'json', $context);

        return new JsonResponse($jsonCustomerList, Response::HTTP_OK, [], true);
    }

    #[Route('/api/customers/{id}', name: 'detailCustomer', methods: ['GET'])]
    #[IsGranted('CUSTOMER_VIEW',  subject: 'customer')]
    public function getDetailCustomer(Customer $customer, SerializerInterface $serializer): JsonResponse 
    {       
        $context = SerializationContext::create()->setGroups(['groups' => 'getCustomers']);
        $jsonCustomer = $serializer->serialize($customer, 'json', $context);

        return new JsonResponse($jsonCustomer, Response::HTTP_OK, ['accept' => 'json'], true);
    }

    #[Route('/api/customers/{id}', name: 'deleteCustomer', methods: ['DELETE'])]
    #[IsGranted('CUSTOMER_DELETE', subject: 'customer')]
    public function deleteCustomer(Customer $customer, EntityManagerInterface $em): JsonResponse 
    {  
        $em->remove($customer);
        $em->flush();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    #[Route('/api/customers', name:"createCustomer", methods: ['POST'])]
    #[IsGranted('CUSTOMER_POST')]
    public function createCustomer(Request $request, UserRepository $userRepository, SerializerInterface $serializer, EntityManagerInterface $em, UrlGeneratorInterface $urlGenerator, ValidatorInterface $validator): JsonResponse 
    {
        $customer = $serializer->deserialize($request->getContent(), Customer::class, 'json');
        $customer->setUser($userRepository->find($this->getUser()));

        $errors = $validator->validate($customer);

        if ($errors->count() > 0) {
            return new JsonResponse($serializer->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        $em->persist($customer);
        $em->flush();

        $context = SerializationContext::create()->setGroups(['groups' => 'getCustomers']);
        $jsonCustomer = $serializer->serialize($customer, 'json', $context);
        $location = $urlGenerator->generate('detailCustomer', ['id' => $customer->getId()], UrlGeneratorInterface::ABSOLUTE_URL);

        return new JsonResponse($jsonCustomer, Response::HTTP_CREATED, ["Location" => $location], true);
   }
}
