<?php

namespace m2i\project\Controllers;
use m2i\Framework\QueryBuilder;
use m2i\Framework\View;

class DefaultController
{
    public function indexAction() {
        $qb = new QueryBuilder();

        $qb->select('nom, prenom')
            ->from('auteurs')
            ->where('nom LIKE "%a%"')
            ->where('prenom IS NOT NULL')
            ->orderBy('prenom')
            ->innerJoin('livres', 'livres.auteur_id=auteurs.id');

        $sql = $qb->getSQL();

        $view = new View();
        echo $view->renderView('default/index', ['sql' => $sql]);
    }
}