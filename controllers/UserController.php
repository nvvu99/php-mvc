<?php

include_once '../dao/UserDAO.php';
include_once '../entities/User.php';

class UserController
{
    private $userDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    public function getAllUsers(): array
    {
        return $this->userDAO->getAllUsers();
    }

    public function getUserById(int $userId): User
    {
        return $this->userDAO->getUserById($userId);
    }
}
