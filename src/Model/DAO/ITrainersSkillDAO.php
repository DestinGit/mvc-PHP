<?php
namespace m2i\projet\Model\DAO;

use m2i\projet\Model\Entity\TrainersSkillDTO;

interface ITrainersSkillDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(TrainersSkillDTO $trainersSkill);

    public function save (TrainersSkillDTO $trainersSkill);

}