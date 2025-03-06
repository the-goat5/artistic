<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit;
}

require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $section = $db->real_escape_string($_POST['section']);
    $image = $_FILES['image'];

    // Vérifier si un fichier a été téléchargé
    if ($image['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'images/';
        $uploadFile = $uploadDir . basename($image['name']);

        // Déplacer le fichier téléchargé vers le dossier des images
        if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
            $url = $uploadFile;
            $query = "INSERT INTO images (section, url) VALUES ('$section', '$url')";
            $db->query($query);
        }
    }
}

header('Location: edit_images.php');
?>