<?php

/**
 * 1. Séparation des oiseaux en deux interfaces : la première représente tous les oiseaux, la seconde étend la première
 *    et représente uniquement les oiseaux qui ont la capacité de voler.
 *
 * 2. Création d'une classe abstraite pour les oiseaux qui ont la capacité de voler, avec une implémentation par défaut
 *    de la méthode de vol, ce qui évite de la réimplémenter à chaque fois (bonne pratique D.R.Y).
 *
 * 3. Sélection de la bonne abstraction pour chaque oiseau, il n'y a plus de surcharge (bonne pratique L de S.O.L.I.D).
 *
 * 4. Création d'une classe représentant les pingouins, ajout d'un exemple au code client.
 *
 * 5. Suppression du lien d'héritage entre le canard et le canard de bain, le canard de bain émet son propre son.
 *    En effet le canard de bain n'a pas la capacité de voler et nécessite des batteries pour fonctionner.
 *    Il n'a finalement rien à voir avec un véritable canard (bonne pratique L de S.O.L.I.D).
 *
 * 6. L'exemple de code client fonctionne désormais avec tout type d'oiseau sans avoir besoin de connaître une
 *    implémentation spécifique (bonne pratique L de S.O.L.I.D).
 *    Ce code peut également se baser sur les abstractions existantes pour fonctionner de manière extensible (bonne
 *    pratique O de S.O.L.I.D).
 */




interface IBird
{
    public function makeSound();
}


interface IFlyingBird extends IBird
{
    public function fly();
}



abstract class FlyingBird implements IFlyingBird
{
    public function fly()
    {
        echo '<h2>I believe I can fly !</h2>';
    }
}



class Duck extends FlyingBird
{
    public function makeSound()
    {
        echo '<h2>Coin Coin naturel !</h2>';
    }
}


class Auk implements IBird
{
    public function makeSound()
    {
        echo '<h2>Fritch !</h2>';
    }
}


class Ostrich implements IBird
{
    public function makeSound()
    {
        echo '<h2>Bruh !</h2>';
    }
}


class BathDuck implements IBird
{
    private $hasBattery;


    public function __construct($battery = null)
    {
        $this->giveBattery($battery);
    }

    public function giveBattery($battery)
    {
        if($battery != null)
        {
            $this->hasBattery = true;
        }
    }

    public function makeSound()
    {
        // Il faut une batterie électrique pour émettre un son.
        if($this->hasBattery == true)
        {
            echo '<h2>Coin Coin électrique !</h2>';
        }
    }
}




// (...) EXEMPLE DE CODE CLIENT

$birds = [ new Duck(), new Duck(), new Auk(), new Ostrich(), new BathDuck() ];

foreach($birds as $bird)
{
    echo '<h1>Nouvel oiseau : '.get_class($bird).'</h1>';

    // S'agit-il d'un oiseau ?
    if($bird instanceof IBird)
    {
        // Oui, donc il doit émettre un son.
        $bird->makeSound();

        // S'agit-il d'un oiseau volant ?
        if($bird instanceof IFlyingBird)
        {
            // Oui, donc il doit voler.
            $bird->fly();
        }
    }
}