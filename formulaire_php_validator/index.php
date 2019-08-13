<?php

$loader = require_once('vendor/autoload.php');
require_once('User.php');


use Symfony\Component\Validator\Validation;
// j'ai utlilisé http foundation mais c'est pas obligatoire
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Annotations\AnnotationRegistry;

use Composer\Autoload\ClassLoader;


/** @var ClassLoader $loader */
AnnotationRegistry::registerLoader([$loader, 'loadClass']);



/**
 * Rappel : vous devrez travailler avec le composant symfony/validator (voir la doc pour savoir
 * l'installer etc) et si vous voulez aussi bosser avec les annotations il faudra aussi bosser
 * avec doctrine/annotations (voir la doc encore une fois :-))
 * 
 * Vous êtes développeur, en entreprise : à part gros blocage, vous vous démerdez, BOSSEZ.
 */

require_once('vendor/autoload.php');
$request = Request::createFromGlobals();

// l'objet $request à une methode get qui renvoie le contenu de $_POST['firtName]
$firstName = $request->get('firstName', '');
$lastName = $request->get('lastName', '');
$email = $request->get('email', '');
$avatar = $request->get('avatar', '');


// Si le POST n'est pas vide c'est bien qu'on a soumis le formulaire
if (!empty($_POST)) {
    // Créez un objet User que vous remplissez avec les données du POST

    $user = new User();

    $user->SetFirstName($firstName)
        ->SetLastName($lastName)
        ->SetEmail($email)
        ->SetAvatar($avatar);

    // Validez l'objet
    $validator = Validation::createValidatorBuilder()
        //->addYamlMapping($configPath) //  va lire les contraintes dans le fichier yaml
        ->enableAnnotationMapping() // va lire les contraintes dans l'entité elle meme via les anotations
        ->getValidator();
    // Si il n'y a pas d'erreurs, affichez un message de confirmation que tout s'est bien passé
    // et die();

    // validation
    $violations = $validator->validate($user);

    if (count($violations) == 0) {
        echo "<h1>C'est OK !</h1>";
        die();
    } else {
        foreach ($violations as $violation) {
            echo  '<p>' . $violation->getMessage() . '</p>';
        }
    }





    // Sinon, le formulaire se réaffiche et montre les erreurs qui ont eu lieu
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Validation de formulaire !</h1>

    <form action="" method="post">
        <div><label for="firstName">Prénom</label><input type="text" name="firstName" value="<?= $firstName ?>"></div>

        <div><label for="lastName">Nom de famille</label><input type="text" name="lastName" value="<?= $lastName ?>"></div>

        <div><label for="email">Adresse email</label><input type="text" name="email" value="<?= $email ?>"></div>

        <div><label for="avatar">URL de l'avatar</label><input type="text" name="avatar" value="<?= $avatar ?>"></div>

        <div><button type="submit">Inscription</button></div>
    </form>
</body>

</html>