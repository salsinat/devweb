<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des salles</title>
    <link rel="stylesheet" href="../vue/style/style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <section>
        <label></label>
        <h1>Liste des salles</h1>
    </section>
    <section>
        <label></label>
        <table class="table_salle">
            <tr>
                <th>Numéro</th>
                <th>Désignation</th>
                <th>Etage</th>
                <th>Equipements</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php foreach ($lignes as $ligne): ?>
                <?php echo $ligne; ?>
            <?php endforeach; ?>
            <tr>
                <td colspan="6">
                    <a href="editSalle.php?op=a" class="ajout">Ajouter une salle</a>
                </td>
            </tr>
        </table>
    </section>
</body>
</html>
