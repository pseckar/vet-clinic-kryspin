<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    $active = isset($_POST['active']) ? true : false;
    $type = isset($_POST['type']) ? $_POST['type'] : 'Warning'; // Default to 'Warning' if not set

    $data = [
        "announcement" => [
            "active" => $active,
            "message" => $message,
            "type" => $type // Save the type to the JSON file
        ]
    ];

    file_put_contents('info.json', json_encode($data, JSON_PRETTY_PRINT));
    header('Location: admin.php?success=1');
    exit;
}

?>