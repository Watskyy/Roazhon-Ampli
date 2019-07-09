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
        $fender1->setAmpli($this->getReference("Fender"));
        $fender1->setMusic($this->getReference("rapeme"));
        $manager->persist($fender1);

        $fender2 = new Setting();
        $fender2->setName("Modern Heavy");
        $fender2->setValue(8.5);
        $fender2->setAmpli($this->getReference("Fender"));
        $fender2->setMusic($this->getReference("rapeme"));
        $manager->persist($fender2);

        $vox = new Setting();
        $vox->setName("Smooth Lead");
        $vox->setValue(2);
        $vox->setAmpli($this->getReference("Vox"));
        $vox->setMusic($this->getReference("foxeylady"));
        $manager->persist(vox);

        $marshall1 = new Setting();
        $marshall1->setName("Super Clean");
        $vox->setValue(2);
        $vox->setAmpli($this->getReference("Vox"));
        $vox->setMusic($this->getReference("foxeylady"));
        $manager->persist($marshall1);

        $gain = new Setting();
        $gain->setName("gain");
        $gain->setBrand($this->getReference("gain"));
        $manager->persist($gain);

        $reverb = new Setting();
        $reverb->setName("reverb");
        $reverb->setBrand($this->getReference("reverb"));
        $manager->persist($reverb);



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
