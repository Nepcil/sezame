<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public const USER = 'USER';
    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setEmail('exemple: email@monsite.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword('$2y$13$dg5otB1sh43Xy8U3gwppg.gfj.IGBsWKqVi9mYFUYzjbcJfDF3MIW');
        $manager->persist($admin);

        $user = new User();
        $user->setEmail('email@monsite.com');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword('$2y$13$dg5otB1sh43Xy8U3gwppg.gfj.IGBsWKqVi9mYFUYzjbcJfDF3MIW');
        $this->addReference(self::USER, $user);

        $manager->persist($user, $admin);
        $manager->flush();
    }
}
