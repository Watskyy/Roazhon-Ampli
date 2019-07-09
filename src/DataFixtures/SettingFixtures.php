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
        $bass = new Setting();
        $bass->setProperty("bass");
        $bass->setValue(3.2);
        $bass->setBrand($this->getReference("bass"));
        $manager->persist($bass);

        $treble = new Setting();
        $treble->setName("treble");
        $treble->setBrand($this->getReference("treble"));
        $manager->persist(treble);

        $middle = new Setting();
        $middle->setName("middle");
        $middle->setBrand($this->getReference("middle"));
        $manager->persist(middle);

        $middle = new Setting();
        $middle->setName("middle");
        $middle->setBrand($this->getReference("middle"));
        $manager->persist(middle);

        $gain = new Setting();
        $gain->setName("gain");
        $gain->setBrand($this->getReference("gain"));
        $manager->persist(gain);

        $reverb = new Setting();
        $reverb->setName("reverb");
        $reverb->setBrand($this->getReference("reverb"));
        $manager->persist(reverb);



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
            BrandFixtures::class,
            MusicFixtures::class
        ];
    }
}
