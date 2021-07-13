<?php

include_once '../entities/User.php';
include_once '../database/DB.php';

class UserDAO
{
    public function getUserById(string $userId): ?User
    {
        $query = 'select * from users where user_id = :userid';

        $connection = DB::getConnection();
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        $count = $stmt->columnCount();
        if ($count == 0) {
            return null;
        }
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();

        return $user;
    }

    public function getAllUsers(): array
    {
        $query = 'select * from users';

        $connection = DB::getConnection();
        $stmt = $connection->prepare($query);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        $users = $stmt->fetchAll();
        $stmt->closeCursor();
        return $users;
    }
}
