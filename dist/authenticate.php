<?php
session_start();

$valid_username = "admin";
$hashed_password = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username === $valid_username && password_verify($password, $hashed_password)) {
        $_SESSION['loggedin'] = true;
        header('Location: admin');
        exit;
    } else {
        $_SESSION['error'] = 'Invalid username or password.';
        header('Location: login');
        exit;
    }
}
?>
