<?php
session_start();
// Chargement de la bibliothèque mvc
require 'lib/mvc.php';
// Chargement du modèle
require  'models/ged-model.php';


$documentList = getDocumentList('data/documents.json');

// Affichage de la vue
echo getRenderedView('ged/list', array(
    'documentList' => $documentList
));