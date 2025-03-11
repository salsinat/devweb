<!DOCTYPE html>
<html>
<head>
    <title>Bonjour</title>
    <meta charset="utf-8">
</head>
<body>
    <?php
        $panier = [ "Banane", "Tomate", "Fraise" ];
        $panier[] =  "Cerise";
        array_unshift($panier, "Kiwi");

        echo "<table> <tr>";
        foreach ($panier as $fruit) {
            echo "<td>$fruit</td>";
        }
        echo "</tr> </table>";

        echo "<table>";
        foreach ($panier as $index => $fruit) {
            echo "<tr>";
            echo "<td>$index</td>";
            echo "<td>$fruit</td>";
            echo "</tr>";
        }
        echo "</table>";

        $achats = [
            "Fruits" => $panier,
            "Legumes" => ["Courgette", "Concombre", "Haricot vert"]
        ];
        
        echo "<table>";
        echo "<tr>";
        foreach ($achats as $key => $value) {
            $colspan = count($value);
            echo "<th colspan='$colspan'>$key</th>";
        }
        echo "</tr>";
        
        echo "<tr>";
        foreach ($achats as $value) {
            
            foreach ($value as $fruit) {
                echo "<td>$fruit</td>";
            }

        }
        echo "</tr>";
        echo "</table>";

        echo "<br>premier fruit : " . $achats["Fruits"][0] . "<br>";
        echo "dernier légume : " . $achats["Legumes"][count($achats["Legumes"]) - 1] . "<br>";

        echo "<br>Fruits : <br>";
        foreach ($achats["Fruits"] as $index => $fruit) {
            echo "$index : $fruit <br>";
        }
        echo "Légumes : <br>";
        foreach ($achats["Legumes"] as $index => $legume) {
            echo "$index : $legume <br>";
        }

        // par ordre alphabétique
        echo "<br>Fruits : <br>";
        asort($achats["Fruits"]);
        foreach ($achats["Fruits"] as $index => $fruit) {
            echo "$index : $fruit <br>";
        }
        echo "Légumes : <br>";
        asort($achats["Legumes"]);
        foreach ($achats["Legumes"] as $index => $legume) {
            echo "$index : $legume <br>";
        }

        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</body>
</html>