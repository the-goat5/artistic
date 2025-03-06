<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit;
}

$db = new mysqli('localhost', 'root', '', 'ccpe_management');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

foreach ($_POST as $key => $value) {
    if (strpos($key, 'text_') === 0) {
        $id = str_replace('text_', '', $key);
        $content = $db->real_escape_string($value);
        $query = "UPDATE texts SET content = '$content' WHERE id = $id";
        $db->query($query);
    }
}

header('Location: dashboard.php');
?>