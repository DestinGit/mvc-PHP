<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 09/08/2017
 * Time: 14:29
 */

namespace m2i\Framework;


class Dispatcher
{
    /**
     * @var IRouter
     */
    private $router;

    private $namespace;

    /**
     * Dispatcher constructor.
     * @param IRouter $router
     */
    public function __construct(IRouter $router, $namespace)
    {
        $this->router = $router;
        $this->namespace = $namespace;
    }

    /**
     * Exécute une action sur un contrôleur en passant des paramètres
     */
    public function dispatch() {
        // Instanciation du contrôleur
        $controllerClassName = $this->namespace . $this->router->getControllerName();
        $controller = new $controllerClassName();

        // Exécution de l'action
        call_user_func_array([$controller, $this->router->getActionName()],
            $this->router->getActionParameters());
    }


}