<?php

namespace App\DataFixtures;

use App\Entity\Rank;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;



class RankFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $rank1 = new Rank();
        $rank1->setValue(4);
        $rank1->persist($rank1);
        $rank1->setMusic($this->getReference('foxeylady'));
        $this->addReference("rank1", $rank1);

        $rank2 = new Rank();
        $rank2->setValue(3.5);
        $rank2->persist($rank2);
        $rank2->setMusic($this->getReference('starwaytoheaven'));
        $this->addReference("rank2", $rank2);

        $rank3 = new Rank();
        $rank3->setValue(4.5);
        $rank3->persist($rank3);
        $rank3->setMusic($this->getReference('rapeme'));
        $this->addReference("rank3", $rank3);

        $rank4 = new Rank();
        $rank4->setValue(3);
        $rank4->persist($rank4);
        $rank4->setMusic($this->getReference('peoplegetready'));
        $this->addReference("rank4", $rank4);

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
            MusicFixtures::class
        ];
    }
}

