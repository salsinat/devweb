<?php
ini_set("display_errors",1);


// Opération : ajouter, modifier, ou supprimer
$op 	= (isset($_GET['op'])?$_GET['op']:null);
$ajout 	= ($op == 'a');
$modif 	= ($op == 'm');
$suppr 	= ($op == 's');
$detail = ($op == 'd');
$idInf 	= (isset($_GET['id_inf'])?$_GET['id_inf']:null);  // Utilisation de l'ID de l'infraction pour l'identification

// accès à la page uniquement si un identifiant d'infraction et statut opération sont passés en paramètre
if ( ($idInf!=null && $ajout) || (($idInf==null) && $modif || $suppr || ($idInf==null && $detail) ) ) {
	header("location: infractions.php"); 
}

// Accès au modèle InfractionDAO
require_once('../modele/infractionDAO.class.php');
$infractionDAO = new InfractionDAO();



// Initialiser les valeurs
$valeurs['id_inf'] = null; 


if ($modif)	{
	$valeurs['id_inf'] = $idInf;
	$uneInfraction = $infractionDAO->getByIdInf($valeurs['id_inf']);
	$titre = 'Infraction - édition des informations';
} else if ($ajout) {
	$valeurs['id_inf'] = $infractionDAO->getNextIdInf();
	$titre = 'Nouvelle Infraction';
} else if ($detail) {
	$uneInfraction = $infractionDAO->getByIdInf($idInf);
	$titre = 'Détails de l\'infraction';
} else {
	header("location: infractions.php");
}

$erreurs = ['id_inf'=>"", 'date_inf'=>'', 'no_immat'=>""];

$valeurs['date_inf'] = (isset($_POST['date_inf'])?trim($_POST['date_inf']):null);
$valeurs['no_immat'] = (isset($_POST['no_immat'])?trim($_POST['no_immat']):null);
$valeurs['no_permis'] = (isset($_POST['no_permis'])?trim($_POST['no_permis']):null);

$retour = false;

// Après la gestion de l'infraction
if (($ajout || $modif) && isset($_POST['delits'])) {
    require_once('../modele/delitByInfractionDAO.class.php');
    $delitByInfractionDAO = new DelitByInfractionDAO();
    
    // Supprimer les anciennes associations
    if ($modif) {
        $delitByInfractionDAO->deleteByInfraction($uneInfraction->getIdInf());
    }
    
    // Ajouter les nouvelles associations
    foreach ($_POST['delits'] as $idDelit) {
        $delitByInfraction = new DelitByInfraction($uneInfraction->getIdInf(), $idDelit);
        $delitByInfractionDAO->insert($delitByInfraction);
    }
}




// Traitement du formulaire
if (isset($_POST['valider'])) {
	// Validation de la date
if (empty($valeurs['date_inf'])) {
    $erreurs['date_inf'] = "La date est obligatoire";
} elseif (!DateTime::createFromFormat('Y-m-d', $valeurs['date_inf'])) {
    $erreurs['date_inf'] = "Format de date invalide (AAAA-MM-JJ requis)";
}

	// Validation des autres champs
	if (!isset($valeurs['no_immat']) or strlen($valeurs['no_immat'])==0) {
		$erreurs['no_immat'] = 'Numéro d\'immatriculation obligatoire.';
	}

	// Compter les erreurs
	$nbErreurs = 0;
	foreach ($erreurs as $erreur) {
 		if ($erreur != "") $nbErreurs++;
 	}

 	// Si aucune erreur, procéder à l'ajout ou la mise à jour
 	if ($nbErreurs == 0){
		$uneInfraction = new Infraction($valeurs['id_inf'], $valeurs['date_inf'], $valeurs['no_immat'], $valeurs['no_permis']);
		$retour = true;
		if ($ajout)	{
			$infractionDAO->insert($uneInfraction);
		}	
		else {			
			$infractionDAO->update($uneInfraction);
		}
	}
}
else if (isset($_POST['annuler']))	{
	$retour = true;
}
else if ($suppr) {
	// Suppression de l'infraction
	$infractionDAO->delete($idInf);
	$retour = true;
}
else if ($modif || $detail) {
	$uneInfraction = $infractionDAO->getByIdInf($idInf);
	$valeurs['id_inf']		= $uneInfraction->getIdInf();
	$valeurs['date_inf'] 	= $uneInfraction->getDateInf();
	$valeurs['no_immat']	= $uneInfraction->getNoImmat();
	$valeurs['no_permis']	= $uneInfraction->getNoPermis();
}

if ($retour) {
	header("location: infractions.php");
}

require_once("../vue/editInfraction.view.php");

?>