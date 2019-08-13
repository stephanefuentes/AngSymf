<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Freelance;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($c = 0; $c < 5; $c++) {
            $category = new Category;
            $category->setTitle($faker->catchPhrase)
                ->setDescription($faker->realText(140))
                ->setSlug($faker->slug);

            $manager->persist($category);

            $limit = mt_rand(5, 20);

            for ($p = 0; $p < $limit; $p++) {
                $freelance = new Freelance;
                $freelance->setFirstName($faker->firstName)
                    ->setLastName($faker->lastName)
                    ->setSlug($faker->slug)
                    ->setPicture("https://place-hold.it/300x200")
                    ->setDescription($faker->realText(200))
                    ->setPrice($faker->randomFloat(2, 1000, 20000))
                    ->setCategory($category);

                $manager->persist($freelance);

                // $freelance = new freelance();
                // $manager->persist($freelance);


            }
        }
        $manager->flush();
    }
}
