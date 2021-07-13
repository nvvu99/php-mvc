<?php

class DB
{
    private static $connection;

    public static function getConnection(): ?PDO
    {
        if (self::$connection == null) {
            $server_host = 'localhost';
            $username = 'niar';
            $password = '682688';
            $db_name = 'mini_project';
            $dsn = "mysql:host={$server_host};dbname={$db_name}";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ];

            try {
                self::$connection = new PDO(
                    $dsn,
                    $username,
                    $password,
                    $options
                );
            } catch (PDOException $ex) {
                echo "Error: {$ex->getMessage()}";
            }
        }

        return self::$connection;
    }
}
