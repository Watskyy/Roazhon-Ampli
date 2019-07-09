<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BrandFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $fender = new Brand();
        $fender->setName("Fender");
        $manager->persist($fender);
        $this->addReference("Fender", $fender);

        $vox = new Brand();
        $vox->setName("Vox");
        $manager->persist($vox);
        $this->addReference("Vox", $vox);

        $marshall25 = new Brand();
        $marshall25->setName("Marshall");
        $this->addReference("Marshall", $marshall25);
        $manager->persist($marshall25);

        $bosskatana = new Brand();
        $bosskatana->setName("Boss");
        $manager->persist($bosskatana);
        $this->addReference("Boss", $bosskatana);

        $manager->flush();
    }
}
