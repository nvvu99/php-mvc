<?php

class User
{
    private $userId;

    private $username;

    private $password;

    public function __construct(
        int $userId = null,
        string $username = null,
        string $password = null
    ) {
        $this->userId = $userId;
        $this->username = $username;
        $this->password = $password;
    }

    public function getUserId(): int
    {
        return (int) $this->userId;
    }

    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }

    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }
}
