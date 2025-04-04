<?php
class Connexion {
	private $db;

	function __construct() {
		$db_config['SGBD']		= 'mysql';
		$db_config['HOST']		= 'devbdd.iutmetz.univ-lorraine.fr';
		$db_config['DB_NAME']	= 'guillera2u_bdinfraction';
		$db_config['USER']		= 'guillera2u_appli';
		$db_config['PASSWORD']	= '32229052';
		try
		{	
			$this->db = new PDO($db_config['SGBD'] .':host='. $db_config['HOST'] .';dbname='. $db_config['DB_NAME'],
								$db_config['USER'],	$db_config['PASSWORD'],
								array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
								// permet d’afficher les caractères utf8 si la BdD est définie en utf8 (accents...)	
			unset($db_config);
		}
		catch( Exception $exception )
		{
			die($exception->getMessage()) ;
		}
	}

	function execSQL(string $req, array $valeurs=[]) : array {
		try
		{
			$sql=$this->db->prepare($req); 
			$sql->execute($valeurs);
			return $sql->fetchAll(PDO::FETCH_ASSOC);// retourne uniquement chaque ligne sous forme d'un tableau associatif (clé) sinon retourne chaque ligne avec double colonne : indice et clé
		}
		catch( Exception $exception )
		{
			die($exception->getMessage()) ;
			$sql=[];
		}
		return $sql;
	}

	function verifierUtilisateur(string $login, string $mdp) {
		// Vérification spéciale pour l'admin
		if ($login === 'admin' && $mdp === 'admin') {
			$_SESSION['username'] = 'admin';
			$_SESSION['is_admin'] = true;
			return true;
		}
	
		// Vérification normale dans la base de données
		$requete = "SELECT * FROM conducteur WHERE no_permis = :login AND mdp = :mdp";
		$resultat = $this->execSQL($requete, ['login' => $login, 'mdp' => $mdp]);
	
		if (!empty($resultat)) { 
			$_SESSION['username'] = $resultat[0]['no_permis']; // Récupérer le numéro de permis
			$_SESSION['is_admin'] = false; // L'utilisateur normal n'est pas admin
			return true;
		}
	
		return false;
	}
	
	
	// function estAdmin($login, $mdp) : bool {
	// 	return ( $login==$this->db_admin['login']  and  $mdp==$this->db_admin['mdp'] );
	// }

}	


?>
