<?php

namespace App\DataFixtures;

use App\Entity\Phone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\ArrayFixtures;
use App\Entity\Customer;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $userPasswordHasher;
    
    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $listUser = [];

        // Création d'un user
        $firstUser = new User();
        $firstUser->setUsername("MobileCash");
        $firstUser->setRoles(["ROLE_USER"]);
        $firstUser->setPassword($this->userPasswordHasher->hashPassword($firstUser, "password"));
        $manager->persist($firstUser);

        $listUser[] = $firstUser;

        // Création d'un second user
        $secondUser = new User();
        $secondUser->setUsername("MobileShop");
        $secondUser->setRoles(["ROLE_USER"]);
        $secondUser->setPassword($this->userPasswordHasher->hashPassword($secondUser, "password"));
        $manager->persist($secondUser);

        $listUser[] = $secondUser;
        
        // Création d'un user admin
        $userAdmin = new User();
        $userAdmin->setUsername("BileMo");
        $userAdmin->setRoles(["ROLE_ADMIN"]);
        $userAdmin->setPassword($this->userPasswordHasher->hashPassword($userAdmin, "password"));
        $manager->persist($userAdmin);  

        // Création des consommateurs
        $arrayFictures = new ArrayFixtures;
        $customerList = $arrayFictures->userList();

        for ($i = 0; $i < 60; $i++) {
            $randomKey = array_rand($customerList);
            $randomCustomer = $customerList[$randomKey];

            $customer = new Customer();
            $customer->setLastName($randomCustomer['lastName']);
            $customer->setFirstName($randomCustomer['firstName']);
            $customer->setEmail($randomCustomer['email']);
            $customer->setUser($listUser[array_rand($listUser)]);

            $manager->persist($customer);
        }

        // Création d'une liste de téléphones mobiles
        $arrayFictures = new ArrayFixtures;
        $phoneList = $arrayFictures->phoneList();

        for ($i = 0; $i < 20; $i++) {
            $randomKey = array_rand($phoneList);
            $randomPhone = $phoneList[$randomKey];

            $phone = new Phone;
            $phone->setModel($randomPhone['model']);
            $phone->setBrand($randomPhone['brand']);
            $phone->setColor($randomPhone['color']);
            $phone->setOperatingSystem($randomPhone['OS']);

            $manager->persist($phone);
        }

        $manager->flush();
    }
}
