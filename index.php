<?php
// Chargement de la bibliothèque
require "lib/mvc.php";
$name = "toto";
$pageTitle = "Accueil";

// Récupération de la vue
$html = getRenderedView("home", [
    "pageTitle" => $pageTitle,
    "name" => $name
]);

echo $html;

//require "views/home.php";