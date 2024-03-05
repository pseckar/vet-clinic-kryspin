<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userInput = $_POST["user_input"]; // Get the user input

    // Define the file path (you can adjust this as needed)
    $filePath = "user_input.txt";

    // Open the file in write mode (creates the file if it doesn't exist)
    $file = fopen($filePath, "w");

    if ($file) {
        // Write the user input to the file
        fwrite($file, $userInput);
        fclose($file);
        echo "Data saved successfully!";
    } else {
        echo "Error: Unable to open the file for writing.";
    }
}
?>  