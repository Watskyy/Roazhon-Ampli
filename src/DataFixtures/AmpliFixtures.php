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
        $this->addReference("fender",$fender);
        $manager->persist($fender);

        $vox = new Ampli();
        $vox->setName("AC 30vr");
        $vox->setBrand($this->getReference("Vox"));
        $this->addReference("vox",$vox);
        $manager->persist($vox);

        $marshall = new Ampli();
        $marshall->setName("Code 25");
        $marshall->setBrand($this->getReference("Marshall"));
        $this->addReference("marshall",$marshall);
        $manager->persist($marshall);

        $boss = new Ampli();
        $boss->setName("Katana 50");
        $boss->setBrand($this->getReference("Boss"));
        $this->addReference("boss",$boss);
        $manager->persist($boss);

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
