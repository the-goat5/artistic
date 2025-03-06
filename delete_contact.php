<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit;
}

require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $query = "DELETE FROM contacts WHERE id = $id";
    $db->query($query);
}

header('Location: edit_contacts.php');
?>