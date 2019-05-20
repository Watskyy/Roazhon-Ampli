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
        $this->addReference("fender", $fender);

        $vox = new Brand();
        $vox->setName("Vox");
        $manager->persist($vox);
        $this->addReference("vox", $vox);

        $manager->flush();
    }
}
