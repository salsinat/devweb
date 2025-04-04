<?php

require_once("connexion.php");
require_once("vehicule.class.php");

class VehiculeDAO {
    private $bd;
    private $select;

    // Constructeur
    public function __construct() {
        $this->bd = new Connexion();  // Assurez-vous que la classe Connexion gère bien la connexion à la BDD
        $this->select = 'SELECT no_immat, date_immat, modele, marque, no_permis FROM vehicule';
    }

    // Insérer un véhicule
    public function insert(Vehicule $vehicule) : void {
        $this->bd->execSQL("INSERT INTO vehicule (no_immat, date_immat, modele, marque, no_permis)
                            VALUES (:no_immat, :date_immat, :modele, :marque, :no_permis)",
                            [
                                ':no_immat' => $vehicule->getNoImmat(),
                                ':date_immat' => $vehicule->getDateImmat(),
                                ':modele' => $vehicule->getModele(),
                                ':marque' => $vehicule->getMarque(),
                                ':no_permis' => $vehicule->getNoPermis()
                            ]);
    }

    // Supprimer un véhicule
    public function delete(string $no_immat) : void {
        $this->bd->execSQL("DELETE FROM vehicule WHERE no_immat = :no_immat", [':no_immat' => $no_immat]);
    }

    // Mettre à jour un véhicule
    public function update(Vehicule $vehicule) : void {
        $this->bd->execSQL("UPDATE vehicule 
                            SET date_immat = :date_immat, modele = :modele, marque = :marque, no_permis = :no_permis 
                            WHERE no_immat = :no_immat",
                            [
                                ':date_immat' => $vehicule->getDateImmat(),
                                ':modele' => $vehicule->getModele(),
                                ':marque' => $vehicule->getMarque(),
                                ':no_permis' => $vehicule->getNoPermis(),
                                ':no_immat' => $vehicule->getNoImmat()
                            ]);
    }

    // Charger les résultats d'une requête
    private function loadQuery(array $result) : array {
        $vehicules = [];
        foreach ($result as $row) {
            $vehicule = new Vehicule();
            $vehicule->setNoImmat($row['no_immat']);
            $vehicule->setDateImmat($row['date_immat']);
            $vehicule->setModele($row['modele']);
            $vehicule->setMarque($row['marque']);
            $vehicule->setNoPermis($row['no_permis']);
            $vehicules[] = $vehicule;
        }
        return $vehicules;
    }

    // Récupérer tous les véhicules
    public function getAll() : array {
        return $this->loadQuery($this->bd->execSQL($this->select));
    }

    // Récupérer un véhicule par son numéro d'immatriculation
    public function getByNoImmat(string $no_immat) : Vehicule {
        $vehicule = new Vehicule();
        $vehicules = $this->loadQuery($this->bd->execSQL($this->select . " WHERE no_immat = :no_immat", [':no_immat' => $no_immat]));
        if (count($vehicules) > 0) {
            $vehicule = $vehicules[0];
        }
        return $vehicule;
    }

    // Vérifier si un véhicule existe
    public function existe(string $no_immat) : bool {
        $req = "SELECT * FROM vehicule WHERE no_immat = :no_immat";
        $res = $this->loadQuery($this->bd->execSQL($req, [':no_immat' => $no_immat]));
        return (count($res) > 0);
    }
}

?>
