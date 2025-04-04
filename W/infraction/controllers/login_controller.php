<?php
include 'models/user_model.php';
include 'includes/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num_permis = $_POST['num_permis'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $userModel = new UserModel($pdo);
    $conducteur = $userModel->authenticate($num_permis, $mot_de_passe);

    if ($conducteur) {
        session_start();
        $_SESSION['conducteur'] = $conducteur;
        header("Location: infractions_view.php");
    } else {
        echo "Identifiants incorrects.";
    }
} else {
    include 'views/login_view.php';
}
?>
