<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit;
}

require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $query = "DELETE FROM images WHERE id = $id";
    $db->query($query);
}

header('Location: edit_images.php');
?>