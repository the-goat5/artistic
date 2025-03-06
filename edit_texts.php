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

// Récupérer les textes existants
$query = "SELECT * FROM texts";
$result = $db->query($query);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier les textes</title>
</head>
<body>
    <h1>Modifier les textes</h1>
    <form action="save_texts.php" method="POST">
        <?php while ($row = $result->fetch_assoc()) : ?>
            <label for="text_<?= $row['id'] ?>"><?= $row['section'] ?></label>
            <textarea id="text_<?= $row['id'] ?>" name="text_<?= $row['id'] ?>"><?= $row['content'] ?></textarea>
        <?php endwhile; ?>
        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>