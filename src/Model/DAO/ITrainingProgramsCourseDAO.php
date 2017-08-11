<?php
namespace m2i\projet\Model\DAO;

use m2i\projet\Model\Entity\TrainingProgramsCourseDTO;

interface ITrainingProgramsCourseDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(TrainingProgramsCourseDTO $trainingProgramsCourse);

    public function save (TrainingProgramsCourseDTO $trainingProgramsCourse);

}