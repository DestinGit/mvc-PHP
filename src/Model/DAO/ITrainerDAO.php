<?php
namespace m2i\projet\Model\DAO;

use m2i\projet\Model\Entity\TrainerDTO;

interface ITrainerDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(TrainerDTO $trainer);

    public function save (TrainerDTO $trainer);

}