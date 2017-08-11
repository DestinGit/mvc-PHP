<?php
namespace m2i\projet\Model\DAO;

use m2i\projet\Model\Entity\CoursesScheduleDTO;

interface ICoursesScheduleDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(CoursesScheduleDTO $coursesSchedule);

    public function save (CoursesScheduleDTO $coursesSchedule);

}