<?php
session_start();

// Chargement de la bibliothèque mvc
require 'lib/mvc.php';
// Chargement du modèle
require  'models/ged-model.php';

define('ROOT_PATH', getcwd());

// Récupération des données
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$isPosted = filter_has_var(INPUT_POST, 'submit');
$upload = $_FILES['docFile'] ?? [];
$errors = [];

// Validation des données
if ($isPosted) {
    // Validation des données

    $errors = validateForm($title, $upload);
    $uploadResult = [];
    // Traitement des données
    if (count($errors) == 0) {
        // Récupération de la liste des documents
        $documentList = getDocumentList('data/documents.json');
        if(titleAlreadyExists($documentList, $title)) {
            $errors[] = "Un document avec le titre $title existe déjà";
        } else {
            // Gestion du téléchargement
            $uploadResult = handleUpload($upload);
            $errors = $uploadResult['errors'];
        }
        // Persistance de la liste des documents
        if (count($errors) == 0) {
            $documentList[] = ['title' => $title, 'file' => $uploadResult['fileName']];
            saveDocument('data/documents.json', $documentList);

            // TODO message flash et redirection
            $_SESSION['flash'] = 'Votre document est enregistré';
            // redirection
            header('location:ged-list.php');
        }

    }
}



// Affichage de la vue
echo getRenderedView('ged/form', [
    'errors' => $errors
]);