<?php
declare(strict_types=1);
$username = "root";
$password = "root";
$dbname = "php_test";
$servername = "mysql_db";
$port = 3306;

$conn = new mysqli($servername, $username, $password, '', $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function createDb($conn)
{
    $schema = file_get_contents("db_schema.sql");
    $conn->multi_query($schema);
}

function createNewUser($conn, $username, $pwd, $email)
{
    $sqlQuery = "INSERT INTO users (username, pwd, email) VALUES ('$username', '$pwd', '$email')";
    $conn->query("USE php_test");
    if ($conn->query($sqlQuery) === true) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sqlQuery . "<br>" . $conn->error;
    }
}

function getUser($conn, $username)
{
    $sqlQuery = "SELECT * FROM users WHERE username = '$username'";
    $conn->query("USE php_test ");
    $result = $conn->query($sqlQuery);
    if ($result->num_rows > 0) {
        var_dump($result->fetch_assoc());
    } else {
        echo "0 results";
    }
}

function updateUser($conn, $key, $value, $username)
{
    $sqlQuery = "UPDATE users SET $key = '$value' WHERE username = '$username'";
    $conn->query("USE php_test ");
    if ($conn->query($sqlQuery) === true) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sqlQuery . "<br>" . $conn->error;
    }
}
function deleteUser($conn, $username)
{
    $sqlQuery = "DELETE FROM users WHERE username = '$username'";
    $conn->query("USE php_test ");
    if ($conn->query($sqlQuery) === true) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $sqlQuery . "<br>" . $conn->error;
    }
}

$conn->close();
