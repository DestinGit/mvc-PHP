<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 11/08/2017
 * Time: 11:33
 */

namespace m2i\project\Controller;


use m2i\Framework\View;
use m2i\project\Model\DAO\PersonDAO;
use m2i\project\Model\Entity\PersonDTO;

class PersonController
{
    public function newAction() {
        $isSubmitted = filter_has_var(INPUT_POST, 'submit');

        if($isSubmitted) {
            $contact = filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);

            $personne = new PersonDTO();
            $personne->hydrate($contact);

            $pdo = new \PDO(
                'mysql:host=localhost;dbname=training_center',
                'root',
                ''
            );
            $dao = new PersonDAO($pdo);

            $dao->save($personne);
        }

        $view = new View();

        echo $view->renderView('person/form');
    }
}