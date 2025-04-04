<?php
ini_set('display_errors', 1);
session_start();
require_once('../modele/infractionDAO.class.php');  
require_once('../modele/delitDAO.class.php'); 
require_once('../modele/delitByInfractionDAO.class.php');  

$infractionDAO = new InfractionDAO();
$delitByInfractionDAO = new DelitByInfractionDAO();
$delitDAO = new DelitDAO();

// Récupérer toutes les infractions
if ($_SESSION['is_admin']) $lesInfractions = $infractionDAO->getAll();
else $lesInfractions = $infractionDAO->getByNoPermis($_SESSION['username']);
$lignes = [];
foreach($lesInfractions as $uneInfraction) {
    $ch = '';
    $lesDelitsByInfraction = $delitByInfractionDAO->getByIdInf($uneInfraction->getIdInf());
    $lesDelits = [];
    foreach($lesDelitsByInfraction as $unDelitByInfraction) {
        $lesDelits[] = $unDelitByInfraction;
    }
    $montant = 0;
    foreach($lesDelits as $unDelit) {
        $montant += $unDelit->getDelit()->getMontant();
    }
    // Afficher les données de chaque infraction
    $ch .= '<td>' . $uneInfraction->getIdInf() . '</td>';
    $ch .= '<td>' . $uneInfraction->getDateInf() . '</td>';
    $ch .= '<td>' . $uneInfraction->getNoImmat() . '</td>';
    $ch .= '<td>' . $uneInfraction->getNoPermis() . '</td>';
    $ch .= '<td>' . $montant . '€</td>';
    
    // Afficher des informations sur l'infraction, par exemple la nature et le montant de l'infraction
    
    if ($_SESSION['is_admin']) {
        
        // Lien pour modifier l'infraction
        $ch .= '<td><a href="editInfraction.php?op=m&id_inf=' . urlencode($uneInfraction->getIdInf()) . '"><img src="../vue/style/modification.png"></a></td>';

        // Lien pour supprimer l'infraction
        $ch .= '<td><a href="editInfraction.php?op=s&id_inf=' . urlencode($uneInfraction->getIdInf()) . '"><img src="../vue/style/corbeille.png"></a></td>';

        // Lien pour voir les détails de l'infraction
        $ch .= '<td><a href="editInfraction.php?op=d&id_inf=' . urlencode($uneInfraction->getIdInf()) . '"><img src="../vue/style/visu.png"></a></td>';
    }
    
    // Ajouter la ligne générée au tableau
    $lignes[] = "<tr>$ch</tr>";
}

unset($lesInfractions);



// Inclure la vue qui affichera les infractions
require_once('../vue/infractions.view.php');
?>



