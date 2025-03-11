<?php
// var_dump($_POST);

$ok = false;
$msg = "UN DES CHAMPS EST MAL REMPLI !";

$prenom = isset($_POST["prenom"])? $_POST["prenom"]: null;
$nom = isset($_POST["nom"])? $_POST["nom"]: null;
$age = isset($_POST["age"])? (int)$_POST["age"]: null;
$genre = isset($_POST["genre"])? $_POST["genre"]: null;
$langages = $_POST["langages"];
$langue = $_POST["langues"][0];
$msg .= " $age";
if ($prenom && $nom && $age!==null && $age >= 0 && $genre && $langages && $langue && isset($_POST["valider"])) {
    $msg = "Tous les champs sont remplis";
    $ok = true;
}

function plural( $amount, $singular='', $plural='s' ) {
    if ( $amount === 1  || $amount === 0 ) {
        return $singular;
    }
    return $plural;
}

function afficheRes($nom, $prenom, $age, $genre, $langages, $langue) {
    echo "Bonjour $prenom $nom, vous avez $age an".plural($age).". <br>";
    switch ($genre) {
        case "M":
            echo "Vous etes un homme.<br>";
            break;
        case "F":
            echo "Vous etes une femme.<br>";
            break;
        case "A":
            echo "Votre sexe est inconnu.<br>";
            break;
    }
    
    if ($langages["autre"]) {
        echo "Vous ne connaissez aucun langage de la liste.<br>";
    } else {
        echo "Vous connaissez le". plural(count($langages)) ." langage". plural(count($langages)) ." suivant". plural(count($langages)). " : ";
        $langs = "";
        foreach($langages as $cle=>$l) {
            $langs .= "$cle, ";
        } 
        echo substr($langs, 0, -2).".<br>";
    }

    echo "Votre langue maternelle est : $langue.<br>";
}

include "formulaire.view.php";
?>