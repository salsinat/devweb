
<?php
ini_set("display_errors",1);
session_start();
require_once('../modele/connexion.php');

$identifiants['username'] = $_POST['username'] ?? null;
$identifiants['password'] = $_POST['password'] ?? null;
$message = "";

if (isset($_POST['Connexion']) && !empty($_POST['Connexion'])) {
    $connexion = new Connexion();
    
    if ($connexion->verifierUtilisateur($identifiants['username'], $identifiants['password'])) {
      
        header('Location: ../controleur/infractions.php'); 
        
        exit;
    } else {
        $message = '<p>Identifiant ou mot de passe incorrect</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Connexion</h1>
    <form action="login.php" method="post">
        <label for="username">Identifiant:</label>
        <input type="text" id="username" name="username" required><br>
        
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit" name="Connexion" value="Connexion">Connexion</button>
    </form>
    <?= $message ?>
</body>
</html>
















