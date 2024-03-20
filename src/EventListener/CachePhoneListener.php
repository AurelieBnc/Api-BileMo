<?php

namespace App\EventListener;

use App\Entity\Phone;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Event\PostLoadEventArgs;
use Doctrine\ORM\Events;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\Cache\TagAwareCacheInterface;

#[AsEntityListener(event: Events::postLoad, method: 'postLoad', entity: Phone::class)]
class CachePhoneListener
{
    private $cachePool;
    private $serializer;

    public function __construct(TagAwareCacheInterface $cachePool, SerializerInterface $serializer) {
         $this->cachePool = $cachePool;
         $this->serializer = $serializer;
    }

    public function postLoad(Phone $phone, PostLoadEventArgs $args): void
    {
        $entity = $args->getObject();

        if (!$entity instanceof Phone) {
            return;
        }

        $idCache = "getPhone-".$phone->getId();
        $serializer = $this->serializer;

        $this->cachePool->get($idCache, function (ItemInterface $item) use ($phone, $serializer){
            $item->tag('PhonesCache');
            $item->expiresAfter(600);
            $context = SerializationContext::create()->setGroups(['groups' => 'getPhones']);

            return $serializer->serialize($phone, 'json', $context);
        });

    }
}
