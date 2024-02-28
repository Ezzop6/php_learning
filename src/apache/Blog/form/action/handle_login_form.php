<?php
namespace Blog\form\action;

require_once '../../db/Database.php';
use Blog\db\Database;

function redirectToIndex(string $message)
{
    header("Location: /Blog?message=$message");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    if (empty($username) || empty($password)) {
        redirectToIndex('Please fill in all fields');
    }
    $db = new Database();
    $result = $db->loginUser($username, $password);
    if (is_array($result)) {
        // TODO:Start session
        $user = $result['username'];
        redirectToIndex("$user logged in successfully");
    } else {
        redirectToIndex('Error logging in user');
    }
} else {
    redirectToIndex('Invalid request');
}
