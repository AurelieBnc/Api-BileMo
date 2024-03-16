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
use App\Service\VersioningService;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Annotations as OA;

class CustomerController extends AbstractController
{
    private $version;

    public function __construct(VersioningService $versioningService) 
    {
        $this->version = $versioningService->getVersion();
    }
    
    /**
     * Cette méthode permet de récupérer l'ensemble des consommateurs.
     *
     * @OA\Response(
     *     response=200,
     *     description="Retourne la liste des consommateurs",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Customer::class, groups={"getCustomers"}))
     *     )
     * )
     * @OA\Response(
     *     response=401,
     *     description="Vous devez vous authentifier",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Customer::class, groups={"getCustomers"}))
     *     )
     * )
     * @OA\Parameter(
     *     name="page",
     *     in="query",
     *     description="La page que l'on veut récupérer",
     *     @OA\Schema(type="int")
     * )
     *
     * @OA\Parameter(
     *     name="limit",
     *     in="query",
     *     description="Le nombre d'éléments que l'on veut récupérer",
     *     @OA\Schema(type="int")
     * )
     * @OA\Tag(name="Customers")
     * 
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
        $context->setVersion($this->version);
        $jsonCustomerList = $serializer->serialize($customerList, 'json', $context);

        return new JsonResponse($jsonCustomerList, Response::HTTP_OK, [], true);
    }


    /**
     * Cette méthode permet de récupérer le détail d'un consommateur.
     *
     * @OA\Response(
     *     response=200,
     *     description="Retourne le détail d'un consommateur",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Customer::class, groups={"getCustomers"}))
     *     )
     * )
     * @OA\Response(
     *     response=401,
     *     description="Vous devez vous authentifier",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Customer::class, groups={"getCustomers"}))
     *     )
     * )
     * @OA\Tag(name="Customers")
     * 
     * @param Customer $customer
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    #[Route('/api/customers/{id}', name: 'detailCustomer', methods: ['GET'])]
    #[IsGranted('CUSTOMER_VIEW',  subject: 'customer')]
    public function getDetailCustomer(Customer $customer, SerializerInterface $serializer): JsonResponse 
    {       
        $context = SerializationContext::create()->setGroups(['groups' => 'getCustomers']);
        $context->setVersion($this->version);
        $jsonCustomer = $serializer->serialize($customer, 'json', $context);

        return new JsonResponse($jsonCustomer, Response::HTTP_OK, ['accept' => 'json'], true);
    }

     /**
     * Cette méthode permet de supprimer un consommateur.
     *
     * @OA\Response(
     *     response=204,
     *     description="Supprime un consommateur",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Customer::class, groups={"getCustomers"}))
     *     )
     * )
     * @OA\Response(
     *     response=401,
     *     description="Vous devez vous authentifier",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Customer::class, groups={"getCustomers"}))
     *     )
     * )
     * @OA\Tag(name="Customers")
     * 
     * @param Customer $customer
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */   
    #[Route('/api/customers/{id}', name: 'deleteCustomer', methods: ['DELETE'])]
    #[IsGranted('CUSTOMER_DELETE', subject: 'customer')]
    public function deleteCustomer(Customer $customer, EntityManagerInterface $em): JsonResponse 
    {  
        $em->remove($customer);
        $em->flush();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Cette méthode permet de créer un consommateur.
     *
     * @OA\Response(
     *     response=201,
     *     description="Crée un consommateur",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Customer::class, groups={"getCustomers"}))
     *     )
     * )
     * 
     * @OA\Response(
     *     response=401,
     *     description="Vous devez vous authentifier",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Customer::class, groups={"getCustomers"}))
     *     )
     * )
     * 
     * @OA\Response(
     *     response=400,
     *     description="Données invalides, veuillez réessayer",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Customer::class, groups={"getCustomers"}))
     *     )
     * )
     * 
     * @OA\RequestBody(
     *     @OA\JsonContent(
     *         type="object",
     *         @OA\Property(property="lastName", type="string", description="Nom de famille du client"),
     *         @OA\Property(property="firstName", type="string", description="Prénom du client"),
     *         @OA\Property(property="email", type="string", format="email", description="Adresse email du client")
     *      )
     * )
     * 
     * @OA\Tag(name="Customers")
     * 
     * @param Request $request
     * @param UserRepository $userRepository
     * @param SerializerInterface $serializer
     * @param EntityManagerInterface $em
     * @param UrlGeneratorInterface $urlGenerator
     * @param ValidatorInterface $validator
     * @return JsonResponse
     */
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
        $context->setVersion($this->version);
        $jsonCustomer = $serializer->serialize($customer, 'json', $context);
        $location = $urlGenerator->generate('detailCustomer', ['id' => $customer->getId()], UrlGeneratorInterface::ABSOLUTE_URL);

        return new JsonResponse($jsonCustomer, Response::HTTP_CREATED, ["Location" => $location], true);
   }
}
