<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    $active = isset($_POST['active']) ? true : false;

    $data = [
        "announcement" => [
            "active" => $active,
            "message" => $message
        ]
    ];

    file_put_contents('info.json', json_encode($data, JSON_PRETTY_PRINT));
    header('Location: admin.php?success=1');
    exit;
}
?>