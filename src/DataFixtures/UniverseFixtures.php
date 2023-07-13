<?php

namespace App\DataFixtures;

use App\Entity\Universe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UniverseFixtures extends Fixture
{
    public const UNIVERSES = [
        'one piece',
        'fire force',
        'l’attaque des titans',
        'hunter x hunter',
        'demon slayer',
        'Bleach',
        'swort art online',
        'JoJo\'s Bizarre',
        'Adventure',
        'DragonBall z',
        'dr stone',
        'death parade',
        'haikyuu!!',
        'black cover',
        'assassination classroom',
        'kuroko’s  basket',
        'naruto shippuden',
        'fairy tail',
        'takyo ghoul',
        'mobpsycho 100',
        'one punch man',
        'fullmetal alchemist brotherhood',
        'death note',
        'my hero academia',
        'evangelion',
        'the promised neverland',
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::UNIVERSES as $key => $universeTitle) {
            $universe = new Universe();
            $universe->setTitle($universeTitle);
            $manager->persist($universe);
            #$this->addReference('universe_' . $key, $universe);#}
        }
        $manager->flush();
    }
}
