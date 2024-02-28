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
  $email = htmlspecialchars($_POST['email']);
  if (empty($username) || empty($password) || empty($email)) {
    redirectToIndex('Please fill in all fields');
  }
  $db = new Database();
  $result = $db->createUser($username, $password, $email);
  if ($result === true) {
    redirectToIndex('User created successfully');
  } else {
    redirectToIndex('Error creating user');
  }
} else {
  redirectToIndex('Invalid request');
}
