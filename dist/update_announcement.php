<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    $active = isset($_POST['active']) ? true : false;
    $type = isset($_POST['type']) ? $_POST['type'] : 'Warning'; // Default to 'Warning' if not set
    $autoHide = isset($_POST['auto_hide']) ? true : false;
    $hideTime = isset($_POST['hide_time']) ? $_POST['hide_time'] : '';
    
    $data = [
        "announcement" => [
            "active" => $active,
            "message" => $message,
            "type" => $type,
            "auto_hide" => $autoHide,
            "hide_time" => $hideTime
        ]
    ];

    $bytesWritten = file_put_contents('data.json', json_encode($data, JSON_PRETTY_PRINT));
    
    // Check if the write operation was successful and set the success query parameter
    $successQuery = $bytesWritten !== false ? 'success=true' : 'success=false';

    header('Location: admin?' . $successQuery);
    exit;
}

?>