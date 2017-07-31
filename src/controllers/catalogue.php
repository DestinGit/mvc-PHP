<?php
function index() {
    require MODEL_PATH . '/catalogue-model.php';

    $connexion = getPDO();
    $resultSet = $connexion->query('SELECT * FROM vue_catalogue');

    echo getRenderedView('catalogue/list', array(
        'resultSet' => $resultSet,
        'catalogue' => getAll()
    ));

    $resultSet = null;
}

function byAuthor(string $name) {
    require MODEL_PATH . '/catalogue-model.php';

    echo getRenderedView('catalogue/list', array(
        'catalogue' => getBooksByAuthor($name)
    ));
}