<?php
session_start();
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['admin_password'])) {
    $admin_password = $_POST['admin_password'];
    
    if ($admin_password === 'admin') { // Remplacez 'admin' par le mot de passe réel
        $_SESSION['admin'] = true;
    } else {
        echo "Mot de passe incorrect.";
        exit;
    }
} else if (!isset($_SESSION['admin'])) {
    ?>
    <form method="post">
        <label for="admin_password">Mot de passe administrateur :</label>
        <input type="password" id="admin_password" name="admin_password" required>
        <button type="submit">Se connecter</button>
    </form>
    <?php
    exit;
}

// Logique pour ajouter, modifier, supprimer des infractions et délits
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Administration des infractions et délits</h1>
    <!-- Ajouter ici les formulaires et la logique pour gérer les infractions et délits -->
    <a href="index.html">Retour à l'accueil</a>
</body>
</html>
