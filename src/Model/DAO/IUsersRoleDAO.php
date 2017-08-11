<?php
namespace m2i\projet\Model\DAO;

use m2i\projet\Model\Entity\UsersRoleDTO;

interface IUsersRoleDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(UsersRoleDTO $usersRole);

    public function save (UsersRoleDTO $usersRole);

}