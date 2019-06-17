<?php

namespace App\DataFixtures;

use App\Entity\Ampli;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AmpliFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $fenderRumble = new Ampli();
        $fenderRumble->setName("Rumble 500");
        $fenderRumble->setBrand($this->getReference("fender"));
        $manager->persist($fenderRumble);

        $fenderRumble = new Ampli();
        $fenderRumble->setName("AC 30vr");
        $fenderRumble->setBrand($this->getReference("Vox"));
        $manager->persist($voxac30);

        $fenderRumble = new Ampli();
        $fenderRumble->setName("Code 25");
        $fenderRumble->setBrand($this->getReference("Marshall"));
        $manager->persist($marshall25);

        $fenderRumble = new Ampli();
        $fenderRumble->setName("Katana 50");
        $fenderRumble->setBrand($this->getReference("Boss"));
        $manager->persist($bosskatana);

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            BrandFixtures::class
        ];
    }
}
