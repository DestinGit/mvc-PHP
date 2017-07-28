<?php
function getViewContent($view, array $data = []) {
//Mise en tampon du résultat de l'interpréteur PHP
    ob_start();
//Exportation des variables
    extract($data);
//inclusion de la vue
    require VIEW_PATH . "/{$view}.php";
//Récupération du contenu du tampon dans une variable
    $viewContent = ob_get_clean();
    return $viewContent;
}

function getRenderedView($view, array $data = [], $layout="default-layout"){
//Récupération du contenu de la vue
    $viewContent = getViewContent($view, $data);
//Ajout de la vue aux données
    $data["viewContent"] = $viewContent;
//Obtention du layout
    $rendered = getViewContent($layout, $data);
    return $rendered;
}

/**
 * Exécute une action dans un fichier contrôleur en passant les éventuels paramètres
 * @param string $url
 * @param array $routes
 */
function dispatch(string $url, array $routes) {
    // Obtention des infos de routage
    $routeInfo = getRouteInfo($url, $routes);

    // Chargement du fichier contrôleur
    require CTRL_PATH . '/' . $routeInfo['controller'] . '.php';

    // Exécution de l'action
    $routeInfo['action'](...$routeInfo['params']);

    // Autre possibilité
    //    call_user_func_array($routeInfo['action'], $routeInfo['params']);

}

function getRouteInfo(string $url, array $routes): array {
    $routeInfo = [
        'controller' => 'error',
        'action' => 'notFoundAction',
        'params' => []
    ];

    foreach ($routes as $path => $target) {
        $route = "#^{$path}$#";

        if (preg_match($route, $url, $matches)) {
            // Récupération de l'action et du contrôleur
            $parts = explode(":", $target);
            // Elimination du premier élément
            array_shift($matches);

            $routeInfo['controller'] = $parts[0];
            $routeInfo['action'] = $parts[1];
            $routeInfo['params'] = $matches;

            break;
        }
    }

    return $routeInfo;
}
