<?php

namespace App\DataFixtures;

use App\Entity\Music;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class MusicFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $foxeylady = new Music();
        $foxeylady ->setTitle("Foxey Lady");
        $foxeylady ->setGain(1.2);
        $foxeylady ->setMiddle(4);
        $foxeylady ->setReverb(3.4);
        $foxeylady ->setBass(2.8);
        $foxeylady ->setTreble(4.4);
        $foxeylady ->setBass(2.8);
        $foxeylady ->setArtist($this->getReference("jimihendrix"));
        $this->addReference("foxeylady", $foxeylady);
        $manager->persist($foxeylady);


        $rapeme = new Music();
        $rapeme ->setTitle("Rape Me");
        $rapeme ->setGain(2.1);
        $rapeme ->setMiddle(3;4);
        $rapeme ->setReverb(2.4);
        $rapeme ->setBass(5.2);
        $rapeme ->setTreble(4.9);
        $rapeme ->setBass(1.1);
        $rapeme ->setArtist($this->getReference("kurtcobain"));
        $this->addReference("rapeme", $rapeme);
        $manager->persist($rapeme);


        $peoplegetready = new Music();
        $peoplegetready ->setTitle("People Get Ready");
        $peoplegetready ->setGain(0.8);
        $peoplegetready ->setMiddle(2.9);
        $peoplegetready ->setReverb(4.7);
        $peoplegetready ->setBass(2);
        $peoplegetready ->setTreble(2.3);
        $peoplegetready ->setBass(3.8);
        $peoplegetready ->setArtist($this->getReference("Jeff Beck"));
        $this->addReference("peoplegetready", $peoplegetready);
        $manager->persist($peoplegetready);


        $starwaytoheaven = new Music();
        $starwaytoheaven ->setTitle("Starway To Heaven");
        $starwaytoheaven ->setGain(1.7);
        $starwaytoheaven ->setMiddle(4.9);
        $starwaytoheaven ->setReverb(2.3);
        $starwaytoheaven ->setBass(2.1);
        $starwaytoheaven ->setTreble(3.3);
        $starwaytoheaven ->setBass(4);
        $starwaytoheaven ->setArtist($this->getReference("jimihendrix"));
        $this->addReference("starwaytoheaven", $starwaytoheaven);
        $manager->persist($starwaytoheaven);


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
            ArtistFixtures::class
        ];
    }
}
