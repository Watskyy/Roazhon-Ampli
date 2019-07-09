<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArtistFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $jimihendrix = new Artist();
        $jimihendrix->setName("Jimi Hendrix");
        $manager->persist($jimihendrix);
        $this->setReference("jimihendrix", $jimihendrix);

        $kurtcobain = new Artist();
        $kurtcobain->setName("Kurt Cobain");
        $manager->persist($kurtcobain);
        $this->setReference("kurtcobain", $kurtcobain);

        $jeffbeck = new Artist();
        $jeffbeck->setName("Jeff Beck");
        $manager->persist($jeffbeck);
        $this->setReference("jeffbeck", $jeffbeck);

        $jimmypage = new Artist();
        $jimmypage->setName("Jimmy Page");
        $manager->persist($jimmypage);
        $this->setReference("jimmypage", $jimmypage);

        $manager->flush();
    }
}
