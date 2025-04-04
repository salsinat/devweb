<?php
include 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO utilisateur (nom, prenom, login, mdp) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nom, $prenom, $login, $mdp]);

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form method="POST" action="inscription.php">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>
        <label for="login">Identifiant :</label>
        <input type="text" id="login" name="login" required><br>
        <label for="mdp">Mot de passe :</label>
        <input type="password" id="mdp" name="mdp" required><br>
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
