// scripts.js

// Fonction pour ouvrir les onglets du tableau de bord
function openTab(tabName) {
    const tabs = document.querySelectorAll('.tab-content');
    tabs.forEach(tab => tab.classList.remove('active'));
    document.getElementById(tabName).classList.add('active');
}

// Fonction pour rediriger vers les pages de modification
function editTexts() {
    window.location.href = "edit_texts.php";
}

function editImages() {
    window.location.href = "edit_images.php";
}

function editContacts() {
    window.location.href = "edit_contacts.php";
}