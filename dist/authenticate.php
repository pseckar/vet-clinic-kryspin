<?php
session_start();

// Load user data from JSON file
$userDataFile = 'user.json';
if (file_exists($userDataFile)) {
    $data = file_get_contents($userDataFile);
    $user = json_decode($data, true);
} else {
    die("User data file not found.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Use the loaded user credentials for authentication
    if ($username === $user['username'] && password_verify($password, $user['hashed_password'])) {
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
