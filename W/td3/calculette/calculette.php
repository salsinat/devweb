<?php
$ok=false;
$entier1=$_GET["valeur1"];
$entier2=$_GET["valeur2"];
$op="";
$msg="";

if(isset($_GET["+"])) {
    $op = "+";
} elseif(isset($_GET["-"])) {
    $op = "-";
} elseif(isset($_GET["*"])) {
    $op = "*";
} elseif(isset($_GET["/"])) {
    $op = "/";
}

if(is_numeric($entier1) && is_numeric($entier2)) {
    $ok = true;
    switch ($op) {
        case "+":
            $res = $entier1 + $entier2;
            break;
        case "-":
            $res = $entier1 - $entier2;
            break;
        case "*":
            $res = $entier1 * $entier2;
            break;
        case "/":
            if($entier2 == 0) {
                $msg = "division par 0";
                $ok = false;
            } else {
                $res = $entier1 + $entier2;
            }
            break;
    }
} else {
    $msg = "il faut que ce soit des nombres";
    $ok = false;
}

function afficheRes($entier1, $entier2, $op, $res){
    echo 
        "<h1>Résultat</h1><div>
        <p>$entier1 $op $entier2 = $res</p></div>";
}

include "calculette.view.php";
?>