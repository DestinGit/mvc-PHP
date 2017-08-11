<?php
namespace m2i\projet\Model\DAO;

use m2i\projet\Model\Entity\DegreeDTO;

interface IDegreeDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(DegreeDTO $degree);

    public function save (DegreeDTO $degree);

}