<?php

namespace App\EventListener;

use App\Entity\Customer;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Event\PostLoadEventArgs;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Event\PostRemoveEventArgs;
use Doctrine\ORM\Events;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\Cache\TagAwareCacheInterface;

#[AsEntityListener(event: Events::prePersist, method: 'prePersist', entity: Customer::class)]
#[AsEntityListener(event: Events::postRemove, method: 'postRemove', entity: Customer::class)]
#[AsEntityListener(event: Events::postLoad, method: 'postLoad', entity: Customer::class)]
class CacheCustomerListener
{
    private $cachePool;
    private $serializer;

    public function __construct(TagAwareCacheInterface $cachePool, SerializerInterface $serializer) {
         $this->cachePool = $cachePool;
         $this->serializer = $serializer;
    }

    public function prePersist(Customer $customer, PrePersistEventArgs $args): void
    {
        $entity = $args->getObject();
        if (!$entity instanceof Customer) {
            return;
        }

        $this->cachePool->invalidateTags(['customersCache']);
    }

    public function postRemove(Customer $customer, PostRemoveEventArgs $args): void
    {
        $entity = $args->getObject();

        if (!$entity instanceof Customer) {
            return;
        }

        $this->cachePool->invalidateTags(['customersCache']);
    }

    public function postLoad(Customer $customer, PostLoadEventArgs $args): void
    {
        $entity = $args->getObject();

        if (!$entity instanceof Customer) {
            return;
        }

        $idCache = "getCustomer-".$customer->getId();
        $serializer = $this->serializer;

        $this->cachePool->get($idCache, function (ItemInterface $item) use ($customer, $serializer){
            $item->tag('customersCache');
            $item->expiresAfter(600);
            $context = SerializationContext::create()->setGroups(['groups' => 'getCustomers']);

            return $serializer->serialize($customer, 'json', $context);
        });

    }
}
