<?php
session_start();
header('Content-Type: application/json');

$db = new mysqli('localhost', 'root', '', 'ccpe_management');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'];
$password = md5($data['password']);

$query = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = $db->prepare($query);
$stmt->bind_param('ss', $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['loggedin'] = true;
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}

$stmt->close();
$db->close();
?>

