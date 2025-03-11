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

        echo "<table>";
        foreach ($entiers50 as $dizaine) {
            echo "<tr>";
            foreach ($dizaine as $entier) {
                echo "<td>$entier</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</body>
</html>