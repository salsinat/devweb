<!DOCTYPE html>
<html>
<head>
    <title>Bonjour</title>
    <meta charset="utf-8">
</head>
<body>
    <?php
        $chaudes = ["jaune", "orange", "rouge"];
        $froides = ["bleu", "vert", "gris"];
        $couleur = "jaune";
        $nom = "Bougdira";
        $sexe = "femme";
        if ($sexe == "homme") {
            echo "Bonjour Mr. $nom,";
        } else {
            echo "Bonjour Mme $nom,";
        }
        if (in_array($couleur, $chaudes)) {
            echo " vous aimez les couleurs chaudes ($couleur).";
        } else {
            echo " vous aimez les couleurs froides ($couleur).";
        }

        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</body>
</html>