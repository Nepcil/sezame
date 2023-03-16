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
        $admin->setEmail('admin@email');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword('AdminPass');
        $manager->persist($admin);

        $user = new User();
        $user->setEmail('user@email');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword('User');
        $this->addReference(self::USER, $user);

        $manager->persist($user, $admin);
        $manager->flush();
    }
}
