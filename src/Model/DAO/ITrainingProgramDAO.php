<?php
namespace m2i\projet\Model\DAO;

use m2i\projet\Model\Entity\TrainingProgramDTO;

interface ITrainingProgramDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(TrainingProgramDTO $trainingProgram);

    public function save (TrainingProgramDTO $trainingProgram);

}