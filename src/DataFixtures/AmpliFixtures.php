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
        $fender = new Ampli();
        $fender->setName("Rumble 500");
        $fender->setBrand($this->getReference("Fender"));
        $manager->persist($fender);

        $vox = new Ampli();
        $vox->setName("AC 30vr");
        $vox->setBrand($this->getReference("Vox"));
        $manager->persist($vox);

        $Marshall = new Ampli();
        $Marshall->setName("Code 25");
        $Marshall->setBrand($this->getReference("Marshall"));
        $manager->persist($Marshall);

        $Boss = new Ampli();
        $Boss->setName("Katana 50");
        $Boss->setBrand($this->getReference("Boss"));
        $manager->persist($Boss);

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
