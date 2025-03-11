<?php
$op = (isset($_GET['op'])) ? $_GET['op'] : null;
$ajout = ($op == 'a');
$modif = ($op == 'm');
$suppr = ($op == 's');
$num = (isset($_GET['num'])) ? $_GET['num'] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$editId = $ajout;

if ($num == null) {
    header("Location: salle.php");
}

$libelles = [];
require_once '../modele/equipementDAO.class.php';
$equipementDAO = new EquipementDAO();
$lesEquipements = $equipementDAO->getNonInventaire($num);
foreach ($lesEquipements as $unEquipt) {
    $libelles[$unEquipt->getId()] = $unEquipt->getLibelle();
}

require_once '../modele/equiptBySalleDAO.class.php';
$equiptBySalleDAO = new EquiptBySalleDAO();

$valeurs['id'] = null;
if ($modif) {
    $valeurs['id'] = $id;
    $unEquiptBySalle = $equiptBySalleDAO->getByNumSalleByIdEquipt($num, $id);
    $valeurs['libelle'] = $unEquiptBySalle->getEquipement()->getLibelle();
}
if ($editId) {
    $valeurs['id'] = (isset($_POST['id'])) ? trim($_POST['id']) : $valeurs['id'];
}

require_once '../modele/salleDAO.class.php';
$salleDAO = new SalleDAO();
$uneSalle = $salleDAO->getByNum($num);
$titre = ($ajout) ? "Salle " . $uneSalle->getNum() . " " . $uneSalle->getLibelle() . " - Nouvel équipement" : "Salle " . $uneSalle->getNum() . " " . $uneSalle->getLibelle() . " - Edition d'une ligne d'inventaire";

$erreurs = ['id' => "", 'qte' => ""];
$valeurs['qte'] = (isset($_POST['qte'])) ? trim($_POST['qte']) : null;
$retour = false;

if (isset($_POST['valider'])) {
    if (!isset($valeurs['id']) || strlen($valeurs['id']) == 0) {
        $erreurs['id'] = 'Saisie obligatoire de l\'équipement';
    }
    if (!isset($valeurs['qte']) || strlen($valeurs['qte']) == 0 || !is_numeric($valeurs['qte'])) {
        $erreurs['qte'] = 'Quantité non valide.';
    }

    $nbErreurs = 0;
    foreach ($erreurs as $erreur) {
        if ($erreur != "") $nbErreurs++;
    }

    if ($nbErreurs == 0) {
        $unEquipt = $equipementDAO->getById($valeurs['id']);
        $unEquiptBySalle = new EquiptBySalle($num, $unEquipt, $valeurs['qte']);
        $retour = true;
        if ($ajout) {
            $equiptBySalleDAO->insert($unEquiptBySalle);
        } else {
            $equiptBySalleDAO->update($unEquiptBySalle);
        }
    }
} elseif (isset($_POST['annuler'])) {
    $retour = true;
} elseif ($suppr) {
    $equiptBySalleDAO->deleteByNumSalleByIdEquipt($num, $id);
    $retour = true;
} elseif ($modif) {
    $unEquiptBySalle = $equiptBySalleDAO->getByNumSalleByIdEquipt($num, $id);
    $valeurs['qte'] = $unEquiptBySalle->getQte();
}

if ($retour) {
    header("Location: salleEquipt.php?num=" . urlencode($num));
}

require_once '../vue/editSalleEquipt.view.php';
?>
