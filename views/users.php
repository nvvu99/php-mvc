<?php

include_once '../controllers/UserController.php';

$userController = new UserController();
$users = $userController->getAllUsers();

foreach ($users as $user) {
    include './templates/user_item.php';
}
