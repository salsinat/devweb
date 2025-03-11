<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titre; ?></title>
    <link rel="stylesheet" href="../vue/style/style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <section>
        <label></label>
        <h1><?php echo $titre; ?></h1>
    </section>
    <section>
        <label></label>
        <table class="table_salle_equipt">
            <tr>
                <th>Numéro</th>
                <th>Désignation</th>
                <th>Quantité</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php foreach ($lignes as $ligne): ?>
                <?php echo $ligne; ?>
            <?php endforeach; ?>
            <tr>
                <td>
                    <a href="salle.php" class="retour">Retour</a>
                </td>
                <td colspan="4">
                    <a href="editSalleEquipt.php?op=a&num=<?php echo urlencode($num); ?>" class="ajout">Ajouter un équipement</a>
                </td>
            </tr>
        </table>
    </section>
</body>
</html>
