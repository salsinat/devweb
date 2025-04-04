<?php

session_start();

include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num_permis = $_POST['num_permis'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $stmt = $pdo->prepare("SELECT * FROM conducteur WHERE num_permis = ? AND mot_de_passe = ?");
    $stmt->execute([$num_permis, $mot_de_passe]);
    $conducteur = $stmt->fetch();
    
    if ($conducteur) {
        $_SESSION['conducteur'] = $conducteur;
    } else {
        echo "Identifiants incorrects.";
        exit;
    }
} else if (!isset($_SESSION['conducteur'])) {
    header("Location: index.html");
    exit;
}

$conducteur = $_SESSION['conducteur'];
$stmt = $pdo->prepare("
    SELECT infraction.date_inf, vehicule.modele, delit.nature, delit.tarif
    FROM infraction
    JOIN vehicule ON infraction.num_immat = vehicule.num_immat
    JOIN comprend ON infraction.id_inf = comprend.id_inf
    JOIN delit ON comprend.id_delit = delit.id_delit
    WHERE infraction.num_permis = ?
");
$stmt->execute([$conducteur['num_permis']]);
$infractions = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infractions de <?= htmlspecialchars($conducteur['prenom']) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Infractions de <?= htmlspecialchars($conducteur['prenom']) ?></h1>
    <table>
        <tr>
            <th>Date</th>
            <th>Véhicule</th>
            <th>Nature du délit</th>
            <th>Tarif</th>
        </tr>
        <?php foreach ($infractions as $infraction): ?>
            <tr>
                <td><?= htmlspecialchars($infraction['date_inf']) ?></td>
                <td><?= htmlspecialchars($infraction['modele']) ?></td>
                <td><?= htmlspecialchars($infraction['nature']) ?></td>
                <td><?= htmlspecialchars($infraction['tarif']) ?> €</td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.html">Déconnexion</a>
</body>
</html>
