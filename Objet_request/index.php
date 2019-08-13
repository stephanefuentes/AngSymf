<?php

//echo "hello world";

require_once('MyRequest.php');


// 1. Allez sur index.php?nombre=12&prenom=Lior
// 2. Il faut que ce code marche bien 
$request = new MyRequest();

$nombre = $request->get('nombre', 15);
echo $nombre; // devrait afficher 12 (puisque index.php?nombre=12)

$prenom = $request->get('prenom', 'toto');
echo $prenom; // devrait afficher Lior (puirsque index.php?prenom=Lior)

// 3. Allez sur index.php sans aucune valeur
$nombre = $request->get('nombre');
echo $nombre; // devrait afficher null
$prenom = $request->get('prenom', 'toto');
echo $prenom; // devrait afficher toto

$nombre = $request->getInt('nombre', 15);
var_dump($nombre); // devrait afficher int: 12 (puisque index.php?nombre=12)
// ou alors null si le parametre n'existe pas ou n'est pas un entier
