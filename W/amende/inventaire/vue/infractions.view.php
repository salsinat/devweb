<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Infractions</title>
    <link rel="stylesheet" href="../vue/style/style.css">
</head>
<body>
    <?php ini_set("display_errors",1);?>
<?php require_once('../vue/header.php'); ?>

 
<section>
    <label></label>
    <h1>Liste des infractions</h1>
</section>
    <table border="1">
        <thead>
            <tr>
                <th>ID Infraction</th>
                <th>Date Infraction</th>
                <th>Numéro Immatriculation</th>
                <th>Conducteur</th>
                <th>Montant</th>
                <?php if ($_SESSION['is_admin']) { 
                echo '<th>Modifier</th>
                <th>Supprimer</th>
                <th>Détails</th>';
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php echo implode("", $lignes); ?>
        </tbody>
    </table>
    <?php if ($_SESSION['is_admin']) {echo '<a id="ajout" href="editInfraction.php?op=a">Ajouter:<img src="../vue/style/ajout.png"></a>';} ?>
</body>
</html>
