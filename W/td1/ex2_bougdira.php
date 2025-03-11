<!DOCTYPE html>
<html>
<head>
    <title>Bonjour</title>
    <meta charset="utf-8">
</head>
<body>
    <?php
        $nom = "Bougdira";
        $sexe = "femme";
        if ($sexe == "homme") {
            echo "Bonjour Mr. $nom !";
        } else {
            echo "Bonjour Mme $nom !";
        }

        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</body>
</html>