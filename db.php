<?php
// includes/db.php
session_start();

$db = new mysqli('localhost', 'root', '', 'ccpe_management');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>