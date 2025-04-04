<?php
ini_set("display_errors",1);
require_once("connexion.php");
require_once("conducteur.class.php");

class ConducteurDAO {
    private $bd;
    private $select;

    // Constructeur
    public function __construct() {
        $this->bd = new Connexion();  // Assurez-vous que la classe Connexion gère bien la connexion à la BDD
        $this->select = 'SELECT id_conducteur, no_permis, date_permis, nom, prenom, mdp FROM conducteur';
    }

    // Insérer un conducteur
    public function insert(Conducteur $conducteur) : void {
        $this->bd->execSQL("INSERT INTO conducteur (id_conducteur, no_permis, date_permis, nom, prenom, mdp)
                            VALUES (:id_conducteur, :no_permis, :date_permis, :nom, :prenom, :mdp)",
                            [
                                ':id_conducteur' => $conducteur->getIdConducteur(),
                                ':no_permis' => $conducteur->getNoPermis(),
                                ':date_permis' => $conducteur->getDatePermis(),
                                ':nom' => $conducteur->getNom(),
                                ':prenom' => $conducteur->getPrenom(),
                                ':mdp' => $conducteur->getMdp()
                            ]);
    }

    // Supprimer un conducteur
    public function delete(string $id_conducteur) : void {
        $this->bd->execSQL("DELETE FROM conducteur WHERE id_conducteur = :id_conducteur", [':id_conducteur' => $id_conducteur]);
    }

    // Mettre à jour un conducteur
    public function update(Conducteur $conducteur) : void {
        $this->bd->execSQL("UPDATE conducteur 
                            SET no_permis = :no_permis, date_permis = :date_permis, nom = :nom, prenom = :prenom, mdp = :mdp 
                            WHERE id_conducteur = :id_conducteur",
                            [
                                ':no_permis' => $conducteur->getNoPermis(),
                                ':date_permis' => $conducteur->getDatePermis(),
                                ':nom' => $conducteur->getNom(),
                                ':prenom' => $conducteur->getPrenom(),
                                ':mdp' => $conducteur->getMdp(),
                                ':id_conducteur' => $conducteur->getIdConducteur()
                            ]);
    }

    // Charger les résultats d'une requête
    private function loadQuery(array $result) : array {
        $conducteurs = [];
        foreach ($result as $row) {
            $conducteur = new Conducteur();
            $conducteur->setIdConducteur($row['id_conducteur']);
            $conducteur->setNoPermis($row['no_permis']);
            $conducteur->setDatePermis($row['date_permis']);
            $conducteur->setNom($row['nom']);
            $conducteur->setPrenom($row['prenom']);
            $conducteur->setMdp($row['mdp']);
            $conducteurs[] = $conducteur;
        }
        return $conducteurs;
    }

    // Récupérer tous les conducteurs
    public function getAll() : array {
        return $this->loadQuery($this->bd->execSQL($this->select));
    }

    // Récupérer un conducteur par son ID
    public function getByIdConducteur(string $id_conducteur) : Conducteur {
        $conducteur = new Conducteur();
        $conducteurs = $this->loadQuery($this->bd->execSQL($this->select . " WHERE id_conducteur = :id_conducteur", [':id_conducteur' => $id_conducteur]));
        if (count($conducteurs) > 0) {
            $conducteur = $conducteurs[0];
        }
        return $conducteur;
    }

    // Vérifier si un conducteur existe
    public function existe(string $id_conducteur) : bool {
        $req = "SELECT * FROM conducteur WHERE id_conducteur = :id_conducteur";
        $res = $this->loadQuery($this->bd->execSQL($req, [':id_conducteur' => $id_conducteur]));
        return (count($res) > 0);
    }
}

?>
