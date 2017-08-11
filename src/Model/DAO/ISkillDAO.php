<?php
namespace m2i\projet\Model\DAO;

use m2i\projet\Model\Entity\SkillDTO;

interface ISkillDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(SkillDTO $skill);

    public function save (SkillDTO $skill);

}