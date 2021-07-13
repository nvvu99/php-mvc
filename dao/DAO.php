<?php

include_once '../database/DB.php';

abstract class DAO
{
    protected $connection;

    protected function __construct()
    {
        $this->connection = DB::getConnection();
    }

    protected function query(string $query, array $params = null): PDOStatement
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
    }
}
