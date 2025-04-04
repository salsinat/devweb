<!DOCTYPE html>
<?php
session_start();
include 'connexion.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

$stmt = $pdo->prepare("SELECT nom, prenom, login FROM utilisateur WHERE login = ?");
$stmt->execute([$_SESSION['login']]);
$utilisateur = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
    <h1>Bienvenu <?php echo htmlspecialchars($utilisateur['prenom']); ?> !</h1>
    <p>Vos informations sont les suivantes :</p>
    <ul>
        <li>Nom : <?php echo htmlspecialchars($utilisateur['nom']); ?></li>
        <li>Prénom : <?php echo htmlspecialchars($utilisateur['prenom']); ?></li>
        <li>Login : <?php echo htmlspecialchars($utilisateur['login']); ?></li>
    </ul>
    <form method="POST" action="logout.php">
        <button type="submit">Déconnexion</button>
    </form>
</body>
</html>
