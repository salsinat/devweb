<!DOCTYPE html>
<html>
<head>
    <title>Bonjour</title>
    <meta charset="utf-8">
</head>
<body>
    <?php
        $nb = 5;

        echo "nb = $nb : $nb ";

        $nb = $nb * 2;

        if ($nb >= 0) {
            while ($nb <= 50) {
                echo "$nb ";
                $nb = $nb * 2;
            }
        }

        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</body>
</html>