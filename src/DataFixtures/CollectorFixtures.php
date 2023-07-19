<?php

namespace App\DataFixtures;

use App\Entity\Collector;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CollectorFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void

    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {

            $collector = new collector();
            $collector->setTitle($faker->words(3, true));
            $collector->setType($faker->words(3, true));
            $collector->setNumber($faker->numberBetween(1, 10));
            $collector->setDescription($faker->paragraphs(3, true));
            $collector->setAccessory($faker->words(5, true));;
            $collector->setPrice($faker->randomFloat(1, 20, 30));
            $collector->setLinkAmazon($faker->shuffle('https://amzn.to/3PJjARK'));
            $collector->setLinkFnac($faker->shuffle('https://tidd.ly/3pDm89l'));

            $collector->setUniverse($this->getReference('universe_' . $faker->numberBetween(0, 25)));

            $manager->persist($collector);
        }


        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [

            UniverseFixtures::class,

        ];
    }
}
