<?php

namespace App\DataFixtures;

use App\Entity\Phone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\ArrayFixtures;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
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
