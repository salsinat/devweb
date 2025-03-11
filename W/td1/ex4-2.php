<!DOCTYPE html>
<html>
<head>
    <title>Bonjour</title>
    <meta charset="utf-8">
</head>
<body>
    <?php
        $entiers50 = [];
        for ($j = 0; $j < 5; $j++) {
            $dizaine = [];
            for ($i = 1; $i <= 10; $i++) {
                $dizaine[] = $i + $j * 10;
            }
            $entiers50[] = $dizaine;
        }

        foreach ($entiers50 as $dizaine) {
            foreach ($dizaine as $entier) {
                echo "$entier ";
            }
            echo "<br>";
        }

        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</body>
</html>