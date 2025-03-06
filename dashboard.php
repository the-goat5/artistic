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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Gestion CCPE</title>
    <style>
        /* Styles CSS (identique à l'exemple précédent) */
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Tableau de bord - Gestion CCPE</h1>
        
        <!-- Onglets -->
        <div class="tabs">
            <button onclick="openTab('content')">Contenu</button>
            <button onclick="openTab('seo')">SEO</button>
            <button onclick="openTab('stats')">Statistiques</button>
        </div>

        <!-- Contenu -->
        <div id="content" class="tab-content active">
            <h2>Gestion du contenu</h2>
            <table>
                <thead>
                    <tr>
                        <th>Élément</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Textes</td>
                        <td><button onclick="editTexts()">Modifier</button></td>
                    </tr>
                    <tr>
                        <td>Images</td>
                        <td><button onclick="editImages()">Modifier</button></td>
                    </tr>
                    <tr>
                        <td>Contacts</td>
                        <td><button onclick="editContacts()">Modifier</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- SEO -->
        <div id="seo" class="tab-content">
            <h2>Gestion SEO</h2>
            <p>Optimisation des balises meta, mots-clés, etc.</p>
        </div>

        <!-- Statistiques -->
        <div id="stats" class="tab-content">
            <h2>Statistiques du site</h2>
            <p>Nombre de visiteurs : <strong>1,234</strong></p>
            <p>Taux de rebond : <strong>45%</strong></p>
        </div>
    </div>

    <script>
        function openTab(tabName) {
            const tabs = document.querySelectorAll('.tab-content');
            tabs.forEach(tab => tab.classList.remove('active'));
            document.getElementById(tabName).classList.add('active');
        }

        function editTexts() {
            window.location.href = "edit_texts.php";
        }

        function editImages() {
            window.location.href = "edit_images.php";
        }

        function editContacts() {
            window.location.href = "edit_contacts.php";
        }
    </script>
</body>
</html>