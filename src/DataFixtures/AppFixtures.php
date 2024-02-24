<?php

namespace App\DataFixtures;

use App\Entity\Phone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\ArrayFixtures;
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
        // Création d'un user
        $user = new User();
        $user->setUsername("MobileCash");
        $user->setRoles(["ROLE_USER"]);
        $user->setPassword($this->userPasswordHasher->hashPassword($user, "password"));
        $manager->persist($user);

        // Création d'un second user
        $user = new User();
        $user->setUsername("MobileShop");
        $user->setRoles(["ROLE_USER"]);
        $user->setPassword($this->userPasswordHasher->hashPassword($user, "password"));
        $manager->persist($user);
        
        // Création d'un user admin
        $userAdmin = new User();
        $userAdmin->setUsername("BileMo");
        $userAdmin->setRoles(["ROLE_ADMIN"]);
        $userAdmin->setPassword($this->userPasswordHasher->hashPassword($userAdmin, "password"));
        $manager->persist($userAdmin);

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
