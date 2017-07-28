<?php
session_start();
// Chargement de la bibliothèque mvc
//require 'lib/mvc.php';
// Chargement du modèle
require MODEL_PATH . '/ged-model.php';


$documentList = getDocumentList(ROOT_PATH . '/data/documents.json');

// Affichage de la vue
echo getRenderedView('ged/list', array(
    'documentList' => $documentList
));