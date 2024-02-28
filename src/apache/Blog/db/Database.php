<?php
declare(strict_types=1);
namespace Blog\db;

require_once __DIR__ . '/DatabaseConnection.php';

use Blog\db\DatabaseConnection;

class Database
{
    private $conn;
    public function __construct()
    {
        $this->conn = new DatabaseConnection('mysql_db', 'root', 'root', 3306);
    }
    public function createDb()
    {
        return $this->conn->createDb();
    }
    public function createUser(string $username, string $password, string $email)
    {
        return $this->conn->createUser($username, $password, $email);
    }
    public function getUser(string $username)
    {
        return $this->conn->getUser($username);
    }
    public function updateUser(string $key, string $newValue, string $username)
    {
        return $this->conn->updateUser($key, $newValue, $username);
    }
    public function loginUser(string $username, string $password)
    {
        return $this->conn->loginUser($username, $password);
    }

}
