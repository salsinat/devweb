<!DOCTYPE html>
<html>
<head>
    <title>Bonjour</title>
    <meta charset="utf-8">
</head>
<body>
    <?php
        $nom =  "Olivier";
        echo "<h1>Bonjour</h1> $nom";

        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</body>
</html>