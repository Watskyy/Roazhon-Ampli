<?php

namespace App\DataFixtures;

use App\Entity\Setting;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class SettingFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $fender1 = new Setting();
        $fender1->setProperty("Cutting Lead");
        $fender1->setValue(7.5);
        $fender1->setAmpli($this->getReference("rumble500"));
        $fender1->setMusic($this->getReference("rapeme"));
        $manager->persist($fender1);

        $fender2 = new Setting();
        $fender2->setName("Modern Heavy");
        $fender2->setValue(8.5);
        $fender2->setAmpli($this->getReference("rumble500"));
        $fender2->setMusic($this->getReference("rapeme"));
        $manager->persist($fender2);

        $vox = new Setting();
        $vox->setName("Smooth Lead");
        $vox->setValue(2);
        $vox->setAmpli($this->getReference("ac30vr"));
        $vox->setMusic($this->getReference("foxeylady"));
        $manager->persist(vox);

        $marshall1 = new Setting();
        $marshall1->setName("Super Clean");
        $marshall1->setValue(9);
        $marshall1->setAmpli($this->getReference("code25"));
        $marshall1->setMusic($this->getReference("starwaytoheaven"));
        $manager->persist($marshall1);

        $marshall2 = new Setting();
        $marshall2->setName("Modern Heavy");
        $marshall2->setValue(10.5);
        $marshall2->setAmpli($this->getReference("code25"));
        $marshall2->setMusic($this->getReference("starwaytoheaven"));
        $manager->persist($marshall2);

        $boss = new Setting();
        $boss->setName("Smooth Lead");
        $boss->setValue(2.5);
        $boss->setAmpli($this->getReference("katana50"));
        $boss->setMusic($this->getReference("peoplegetready"));
        $boss->persist($boss);



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
            AmpliFixtures::class,
            MusicFixtures::class
        ];
    }
}
