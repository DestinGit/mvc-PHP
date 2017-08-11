<?php
namespace m2i\projet\Model\DAO;

use m2i\projet\Model\Entity\DegreeLevelDTO;

interface IDegreeLevelDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(DegreeLevelDTO $degreeLevel);

    public function save (DegreeLevelDTO $degreeLevel);

}