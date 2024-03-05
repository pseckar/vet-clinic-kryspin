<?php
// Example to generate a hashed password
$plainPassword = ""; // Replace with your actual password
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);
echo $hashedPassword;
?>