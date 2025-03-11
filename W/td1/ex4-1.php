<!DOCTYPE html>
<html>
<head>
    <title>Bonjour</title>
    <meta charset="utf-8">
</head>
<body>
    <?php
        $entiers10 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

        foreach ($entiers10 as $entier) {
            echo "$entier ";
        }

        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</body>
</html>