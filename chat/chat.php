<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (username, message) VALUES ('$username', '$message')";
    $result = $con->query($sql);

    echo json_encode(['success' => $result]);
} else {
    $sql = "SELECT * FROM messages ORDER BY timestamp DESC";
    $result = $con->query($sql);

    $messages = [];
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }

    echo json_encode(['messages' => array_reverse($messages)]);
}
?>
