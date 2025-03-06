<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit;
}

require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $db->real_escape_string($_POST['name']);
    $phone = $db->real_escape_string($_POST['phone']);

    $query = "INSERT INTO contacts (name, phone) VALUES ('$name', '$phone')";
    $db->query($query);
}

header('Location: edit_contacts.php');
?>