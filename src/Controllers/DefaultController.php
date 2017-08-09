<?php

namespace m2i\project\Controllers;
use m2i\Framework\View;

class DefaultController
{
    public function indexAction() {
        $view = new View();
        echo $view->renderView('default/index', []);
    }
}