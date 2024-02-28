<?php
declare(strict_types=1);
namespace Blog\db;

require_once __DIR__ . '/Constant.php';

use mysqli;
use Blog\db\Constant;

class DatabaseConnection
{
    private $username;
    private $password;
    private $serverName;
    private $port;
    private $conn;
    public function __construct(
        string $serverName,
        string $username,
        string $password,
        int $port
    ) {
        $this->username = $username;
        $this->password = $password;
        $this->serverName = $serverName;
        $this->port = $port;
    }
    public function connect()
    {

        $conn = new mysqli(
            $this->serverName,
            $this->username,
            $this->password,
            '',
            $this->port
        );
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $this->conn = $conn;
    }
    public function close()
    {
        $this->conn->close();
    }
    public function createDb()
    {
        $this->connect();
        $schema = file_get_contents(__DIR__ . '/schema.sql');
        $this->conn->multi_query($schema);
        $this->close();
    }
    public function createUser(string $username, string $pwd, string $email)
    {
        $this->connect();
        try {
            $sql = "INSERT INTO users (username, pwd, email) VALUES ('$username', '$pwd', '$email')";
            $this->conn->query(Constant::DB);
            $result = $this->conn->query($sql);
            if ($result === true) {
                return "New record created successfully";
            } else {
                return $this->conn->error;
            }
        } finally {
            $this->close();
        }
    }
    public function getUser(string $username)
    {
        $this->connect();
        try {
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $this->conn->query(Constant::DB);
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return "0 results";
            }
        } finally {
            $this->close();
        }

    }
    public function updateUser(string $key, string $newValue, string $username)
    {
        $this->connect();
        try {
            $sql = "UPDATE users SET $key = '$newValue' WHERE username = '$username'";
            $this->conn->query(Constant::DB);
            $result = $this->conn->query($sql);
            if ($result === true) {
                return "Record updated successfully";
            } else {
                return $this->conn->error;
            }
        } finally {
            $this->close();
        }
    }
    public function loginUser(string $username, string $password)
    {
        $this->connect();
        try {
            $sql = "SELECT * FROM users WHERE username = '$username' AND pwd = '$password'";
            $this->conn->query(Constant::DB);
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return false;
            }
        } finally {
            $this->close();
        }
    }
}
