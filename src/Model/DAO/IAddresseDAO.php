<?php
namespace m2i\projet\Model\DAO;

use m2i\projet\Model\Entity\AddresseDTO;

interface IAddresseDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(AddresseDTO $addresse);

    public function save (AddresseDTO $addresse);

}