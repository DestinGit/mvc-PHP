<?php
// Chargement de la bibliothèque
//require "lib/mvc.php";
$pageTitle = "Accueil";
$name = filter_input(INPUT_GET, "name", FILTER_SANITIZE_STRING);

// Récupération de la vue
$html = getRenderedView("home", [
    "pageTitle" => $pageTitle,
    "name" => $name
]);

echo $html;