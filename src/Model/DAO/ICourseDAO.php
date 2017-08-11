<?php
namespace m2i\projet\Model\DAO;

use m2i\projet\Model\Entity\CourseDTO;

interface ICourseDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(CourseDTO $course);

    public function save (CourseDTO $course);

}