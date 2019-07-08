<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setEmail("admin@gmail.com");
        $admin->setRoles(["ROLE_ADMIN"]);
        $password = $this->encoder->encodePassword($admin, '1234');
        $admin->setPassword($password);

        $manager->persist($admin);

        $johndoe = new User();
        $johndoe->setEmail("johndoe@gmail.com");
        $password = $this->encoder->encodePassword($johndoe, '1234');
        $johndoe->setPassword($password);

        $manager->persist($johndoe);


        $manager->flush();
    }
}
