<?php

namespace App\DataFixtures;

use App\Entity\Person;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PersonFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $p1 = new Person();
        $p1->setName("olivier");
        $manager->persist($p1);

        $p2 = new Person();
        $p2->setName("adrien");
        $manager->persist($p2);

        $manager->flush();
    }
}
