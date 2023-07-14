<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setEmail('admin@limited.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->userPasswordHasher->hashPassword($admin, 'admin'));
        $manager->persist($admin);

        $manager->flush();
    }
}
