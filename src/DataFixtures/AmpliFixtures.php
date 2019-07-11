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
        $rumble500 = new Ampli();
        $rumble500->setName("Rumble 500");
        $rumble500->setBrand($this->getReference("Fender"));
        $this->addReference("rumble500",$rumble500);
        $manager->persist($rumble500);

        $ac30vr = new Ampli();
        $ac30vr->setName("AC 30vr");
        $ac30vr->setBrand($this->getReference("Vox"));
        $this->addReference("ac30vr",$ac30vr);
        $manager->persist($ac30vr);

        $code25 = new Ampli();
        $code25->setName("Code 25");
        $code25->setBrand($this->getReference("Marshall"));
        $this->addReference("code25",$code25);
        $manager->persist($code25);

        $katana50 = new Ampli();
        $katana50->setName("Katana 50");
        $katana50->setBrand($this->getReference("Boss"));
        $this->addReference("katana50",$katana50);
        $manager->persist($katana50);

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
