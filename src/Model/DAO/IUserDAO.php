<?php
namespace m2i\projet\Model\DAO;

use m2i\projet\Model\Entity\UserDTO;

interface IUserDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(UserDTO $user);

    public function save (UserDTO $user);

}