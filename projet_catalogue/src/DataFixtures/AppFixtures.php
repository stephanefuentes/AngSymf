<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Rating;
use App\Entity\Product;
use App\Entity\Category;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //$faker = Faker\Factory::create();
        $faker = \Faker\Factory::create('fr_FR');

        
        // $product = new Product();
        // $categoy = new Category();
        for($c = 0; $c < 10; $c++)
        {
            $category = new Category();
            $category->setTitle($faker->title.' '.$faker->word)
                    ->setSlug($faker->slug)
                    ->setDescription($faker->realText($faker->numberBetween(150,200)));

                    $manager->persist($category);


            for($p = 0; $p < mt_rand(2,8) ; $p++)
            {
                $product = new Product();
                $product->setTitle($faker->word)
                        ->setSlug($faker->slug)
                        ->setDescription($faker->realText($faker->numberBetween(150,200)))
                        ->setImage("https://place-hold.it/300x200")
                        ->setPrice($faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 500))
                        ->setCategory($category);

                        $manager->persist($product);


                for($r = 0; $r < 5; $r++)
                {
                    $rating = new Rating();
                    $rating->setAuthor($faker->name)
                        ->setContent($faker->realText($faker->numberBetween(100,200)))
                        ->setNotation($faker->numberBetween($min = 1, $max = 10) )
                        ->setCreatedAt($faker->dateTimeBetween($startDate = '-6 month', $endDate = 'now', $timezone = null))
                        ->setProduct($product);
        
                        $manager->persist($rating);
                }

            }

        }

     

//         $book = new Book();
// $book->setTitle($faker->title);
// $book->setISBN($faker->ISBN);
// $book->setSummary($faker->text);
// $book->setPrice($faker->randomNumber(2));
// $faker->realText($faker->numberBetween(10,20));

// dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null) 

// randomDigit             // 7
// randomDigitNotNull      // 5
// randomNumber($nbDigits = NULL, $strict = false) // 79907610
// randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL) // 48.8932
// numberBetween($min = 1000, $max = 9000) // 8567
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
