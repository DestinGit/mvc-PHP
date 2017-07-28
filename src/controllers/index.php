<?php
// Chargement de la bibliothèque
require "lib/mvc.php";
$name = "toto";
$pageTitle = "Accueil";

// liste de tous les fichiers dans  /data
$fileList = glob("data/*.json");

//foreach ($fileList as $filename) {
//    echo "$filename size " . filesize($filename) . "\n";
//}
// Récupération de la vue
$html = getRenderedView("home", [
    "pageTitle" => $pageTitle,
    "name" => $name,
    "list" => $fileList
]);

echo $html;
