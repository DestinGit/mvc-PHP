<?php
/**
 * Récupère l'ensemble des données du catalogue des livres
 * @return array
 */
function getAll():array {
    $connexion = getPDO();

    $resultSet = $connexion->query('SELECT id, titre, prix, nom_complet, editeur, genre FROM vue_catalogue');
//    $resultSet = $connexion->query('SELECT * FROM vue_catalogue');

    return $resultSet->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * @param string $name
 * @return array
 */
function getBooksByAuthor(string $name): array {
    // Connexion à la base de données
    $connexion = getPDO();
    // requête SQL
    $sql = 'SELECT id, titre, prix, nom_complet, editeur, genre FROM vue_catalogue WHERE nom_auteur LIKE :name';
    // Définition de la requête préparée
    $resultSet = $connexion->prepare($sql);

    $resultSet->bindParam('name', $name, PDO::PARAM_STR);
    $resultSet->execute();

    return $resultSet->fetchAll(PDO::FETCH_ASSOC);
}