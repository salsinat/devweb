<!DOCTYPE html>
<html>
<head>
    <title>Bonjour</title>
    <meta charset="utf-8">
</head>
<body>
    <?php
        function est_divisible_par_3($n) {
            return $n % 3 == 0;
        }
        
        function est_divisible_par_2($n) {
            return $n % 2 == 0;
        }
        echo "<ul>";
        for ($i = 1; $i <= 10; $i++) {
            $d3 = est_divisible_par_3($i);
            $d2 = est_divisible_par_2($i);
            echo "<li>$i ";
            if ($d3 && $d2) {
                echo "est divisible par 2 et par 3";
            } elseif ($d3) {
                echo "est divisible par 3";
            } elseif ($d2) {
                echo "est divisible par 2";
            } else {
                echo "n'est divisible ni par 2 ni par 3";
            }
            echo "</li>";
        }

        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</body>
</html>