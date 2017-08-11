<?php
namespace m2i\projet\Model\DAO;

use m2i\projet\Model\Entity\PersonDTO;

interface IPersonDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(PersonDTO $person);

    public function save (PersonDTO $person);

}