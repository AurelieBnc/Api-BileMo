<?php

namespace App\Controller;

use App\Entity\Phone;
use App\Repository\PhoneRepository;
use JMS\Serializer\SerializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Service\VersioningService;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Annotations as OA;

class PhoneController extends AbstractController
{
    private $version;

    public function __construct(VersioningService $versioningService) 
    {
        $this->version = $versioningService->getVersion();
    }

    /**
     * Cette méthode permet de récupérer l'ensemble des téléphones.
     *
     * @OA\Response(
     *     response=200,
     *     description="Retourne la liste des téléphones",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Phone::class, groups={"getPhones"}))
     *     )
     * )
     * @OA\Response(
     *     response=401,
     *     description="Vous devez vous authentifier",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Phone::class, groups={"getPhones"}))
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
     * @OA\Tag(name="Phones")
     * 
     * @param PhoneRepository $phoneRepository
     * @param SerializerInterface $serializer
     * @param Request $request
     * @return JsonResponse
     */
    #[Route('/api/phones', name: 'phones', methods: ['GET'])]
    public function getPhoneList(PhoneRepository $phoneRepository, SerializerInterface $serializer,  Request $request): JsonResponse
    {
        $page = $request->get('page', 1);
        $limit = $request->get('limit', 5);

        $phoneList = $phoneRepository->findAllWithPagination($page, $limit);

        $context = SerializationContext::create()->setVersion($this->version);
        $jsonPhoneList = $serializer->serialize($phoneList, 'json', $context);

        return new JsonResponse($jsonPhoneList, Response::HTTP_OK, [], true);
    }

        /**
     * Cette méthode permet de récupérer le détail d'un téléphone.
     *
     * @OA\Response(
     *     response=200,
     *     description="Retourne le détail d'un téléphone",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Phone::class, groups={"getPhones"}))
     *     )
     * )
     * @OA\Response(
     *     response=401,
     *     description="Vous devez vous authentifier",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Phone::class, groups={"getPhones"}))
     *     )
     * )
     * @OA\Tag(name="Phones")
     * 
     * @param Phone $phone
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    #[Route('/api/phones/{id}', name: 'detailPhone', methods: ['GET'])]
    public function getDetailPhone(Phone $phone, SerializerInterface $serializer): JsonResponse 
    {
        $context = SerializationContext::create()->setVersion($this->version);
        $jsonPhone = $serializer->serialize($phone, 'json', $context);

        return new JsonResponse($jsonPhone, Response::HTTP_OK, ['accept' => 'json'], true);
    }
}
