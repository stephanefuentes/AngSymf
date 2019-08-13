<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Promotion;
use App\Entity\Student;
use App\Entity\Note;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($p = 0; $p < 5; $p++) {
            $promotion = new Promotion();
            $promotion->setTitle($faker->catchPhrase)
                ->setSlug($faker->slug)
                ->setCity($faker->city);

            $manager->persist($promotion);

            for ($s = 0; $s < mt_rand(2, 6); $s++) {
                $student = new Student();
                $student->setFirstName($faker->firstName)
                    ->setLastName($faker->lastName)
                    ->setPromotion($promotion);

                $manager->persist($student);

                for ($n = 0; $n < 6; $n++) {
                    $note = new Note();
                    $note->setNotation($faker->randomFloat($nbMaxDecimals = 5, $min = 2, $max = 200))
                        ->setComment($faker->realText(200))
                        ->setSubject($faker->word)
                        ->setStudent($student);

                    $manager->persist($note);
                }
            }
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();

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
    }
}
