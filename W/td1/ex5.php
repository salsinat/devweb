<!DOCTYPE html>
<html>
<head>
    <title>Bonjour</title>
    <meta charset="utf-8">
</head>
<body>
    <?php
        include "functions.php"; // ou require "functions.php";
        $tabEntiers = [1, 3, 5, 98, 12, 34];
        $tabFruits = ['Melon', 'Pomme', 'Poire'];

        afficheTab($tabEntiers);
        afficheTab($tabFruits);
        // afficheTab(2);

        $chaine = "  Ceci est une phrase avec des espaces en trop.  ";
        echo "<pre>$chaine</pre>";
        afficheTab(chaineVersTab($chaine));

        afficheTabCles($tabFruits);
        afficheTab2([
            chaineVersTab("Luke Skywalker"), 
            chaineVersTab("Han Solo"),
            chaineVersTab("Organa Leia")
        ]);

        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</body>
</html>