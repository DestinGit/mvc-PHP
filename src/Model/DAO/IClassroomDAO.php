<?php
namespace m2i\projet\Model\DAO;

use m2i\projet\Model\Entity\ClassroomDTO;

interface IClassroomDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(ClassroomDTO $classroom);

    public function save (ClassroomDTO $classroom);

}