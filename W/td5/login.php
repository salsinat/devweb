<?php
session_start();
include 'connexion.php';

function existeUtilisateur($identifiants) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE login = ? AND mdp = ?");
    $stmt->execute([$identifiants['login'], $identifiants['mdp']]);
    return $stmt->fetch() !== false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifiants = [
        'login' => $_POST['login'],
        'mdp' => $_POST['mdp']
    ];

    if (existeUtilisateur($identifiants)) {
        $_SESSION['login'] = $identifiants['login'];
        header("Location: accueil.php");
        exit();
    } else {
        $message = "Identification incorrecte. Essayez de nouveau.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Authentification</title>
</head>
<body>
    <h1>Authentification</h1>
    <form method="POST" action="login.php">
        <label for="login">Identifiant :</label>
        <input type="text" id="login" name="login" required><br>
        <label for="mdp">Mot de passe :</label>
        <input type="password" id="mdp" name="mdp" required><br>
        <button type="submit">Connexion</button>
    </form>
    <?php if (isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <p><a href="inscription.php">Pas encore de compte? Inscrivez-vous.</a></p>
</body>
</html>
