<html>
<head>
<meta charset="utf-8">
<title>Liste des ventes d'un site</title>
<link rel="stylesheet" href="../vue/style/style.css">
</head>
<body>
<?php require_once('../vue/header.php'); ?>
<section>
    <label></label>
    <h1>Liste des équipements de la salle <?=$titre ?></h1>
</section>

<section>
    <label></label>
    <table border="1" class="table_salle_equipt" >
    <tr>
        <th>Numéro</th><th>Désignation</th><th>Quantité</th><th></th><th></th>
    </tr>

    <?php
    foreach($lignes as $ligne) {
        echo $ligne;
    }
    ?>

    <tr><td colspan="5"></td></tr>
    <tr>
        <td style="text-align:right" ><a href="salles.php?" class='retour' >Retour</a></td>
        <td colspan="4" style="text-align:right" ><a href="editSalleEquipt.php?op=a&num=<?=urlencode($num) ?>" class="ajout" >Ajouter un équipement</a></td>
    </tr>
    </table>
</section>

</body>
</html>