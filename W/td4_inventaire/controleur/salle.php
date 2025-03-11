<?php
require_once '../modele/salleDAO.class.php';

$salleDAO = new SalleDAO();
$lesSalles = $salleDAO->getAll();
$lignes = [];

foreach ($lesSalles as $uneSalle) {
    $ch = '';
    $ch .= '<td>' . $uneSalle->getNum() . '</td>';
    $ch .= '<td>' . $uneSalle->getLibelle() . '</td>';
    $ch .= '<td>' . $uneSalle->getEtage() . '</td>';
    $nb = $salleDAO->getTotalNbEquipt($uneSalle->getNum());
    if ($nb == 0) {
        $ch .= '<td><a href="editSalleEquipt.php?op=a&num=' . urlencode($uneSalle->getNum()) . '" class="info">inventaire</a></td>';
    } else {
        $ch .= '<td><a href="salleEquipt.php?num=' . urlencode($uneSalle->getNum()) . '" class="info">' . $nb . '</a></td>';
    }
    $ch .= '<td><a href="editSalle.php?op=m&num=' . urlencode($uneSalle->getNum()) . '"><img src="../vue/style/images/modification.png"></a></td>';
    $ch .= '<td><a href="editSalle.php?op=s&num=' . urlencode($uneSalle->getNum()) . '"><img src="../vue/style/images/corbeille.png"></a></td>';
    $lignes[] = "<tr>$ch</tr>";
}

unset($lesSalles);
require_once '../vue/salle.view.php';
?>
