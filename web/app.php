<?php
use m2i\Framework\Router;
use m2i\Framework\Dispatcher;

// Définition des constantes
define('ROOT_PATH', dirname(__DIR__));
define('WEB_PATH', __DIR__);
define('SRC_PATH', ROOT_PATH . '/src');

define('VIEW_PATH', SRC_PATH . '/views');
define('CTRL_PATH', SRC_PATH . '/controller');
define('MODEL_PATH', SRC_PATH . '/models');

// Chargement des constantes de l'application
require SRC_PATH. '/conf/const.php';

// Chargement du Framework
require ROOT_PATH . '/vendor/autoload.php';

// Récupération de la liste des routes
$routes = require SRC_PATH . '/conf/routes.php';

$url = filter_input(INPUT_GET, 'c', FILTER_SANITIZE_URL);

$router = new Router($url, $routes);

$dispatcher = new Dispatcher($router, 'm2i\\project\\Controller\\');
$dispatcher->dispatch();

//dispatch($url, $routes);