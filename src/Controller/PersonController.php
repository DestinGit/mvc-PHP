<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 11/08/2017
 * Time: 11:33
 */

namespace m2i\project\Controller;


use m2i\Framework\View;
use m2i\project\Model\DAO\CitieDAO;
use m2i\project\Model\DAO\PersonDAO;
use m2i\project\Model\Entity\PersonDTO;
use \m2i\Framework\ServiceContainer as SC;

class PersonController
{
    public function newAction() {
        $isSubmitted = filter_has_var(INPUT_POST, 'submit');

        if($isSubmitted) {
            $contact = filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);

            $personne = $this->getPersonDTO();
            $personne->hydrate($contact);

            $dao = $this->getPersonDAO();
            $dao->save($personne);
        }

        $view = $this->getView();
        echo $view->renderView('person/form');
    }

    public function cityByPostalCodeAction($postalCode) {
        $dao = $this->getCityDAO();
        $cities = $dao->find(['postal_code'=>$postalCode])
            ->getAllAsArray();

        header('Content-Type: application/json');
        echo json_encode($cities);
    }

    /**
     * @return PersonDTO
     */
    private function getPersonDTO():PersonDTO {
        return SC::get('person.dto');
    }


    /**
     * @return PersonDAO
     */
    private function getPersonDAO():PersonDAO
    {
       return SC::get('person.dao');
    }

    /**
     * @return CitieDAO
     */
    private function getCityDAO():CitieDAO {
        return SC::get('city.dao');
    }
    /**
     * @return View
     */
    private function getView(): View
    {
        return SC::get('view');
    }
}