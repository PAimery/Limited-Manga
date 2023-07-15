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
        $admin->setPseudonym('Baptiste');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->userPasswordHasher->hashPassword($admin, 'baptiste'));
        $manager->persist($admin);
        $manager->flush();

        $user = new User();
        $user->setEmail('user@limited.com');
        $user->setPseudonym('Aimery');
        $user->setPassword($this->userPasswordHasher->hashPassword($user, 'aimery'));
        $manager->persist($user);
        $manager->flush();
    }
}
