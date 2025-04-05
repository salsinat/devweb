<?php
ini_set("display_errors",1);
require_once("connexion.php");
require_once("conducteur.class.php");

class ConducteurDAO {
    private $bd;
    private $select;

    public function __construct() {
        $this->bd = new Connexion();
        $this->select = 'SELECT no_permis, date_permis, nom, prenom, mdp FROM conducteur';
    }

    // Insérer un conducteur
    public function insert(Conducteur $conducteur) : void {
        $this->bd->execSQL("INSERT INTO conducteur (no_permis, date_permis, nom, prenom, mdp)
                          VALUES (:no_permis, :date_permis, :nom, :prenom, :mdp)",
                          [
                              ':no_permis' => $conducteur->getNoPermis(),
                              ':date_permis' => $conducteur->getDatePermis(),
                              ':nom' => $conducteur->getNom(),
                              ':prenom' => $conducteur->getPrenom(),
                              ':mdp' => $conducteur->getMdp()
                          ]);
    }

    // Supprimer un conducteur (utilise no_permis comme clé)
    public function delete(string $no_permis) : void {
        $this->bd->execSQL("DELETE FROM conducteur WHERE no_permis = :no_permis", 
                          [':no_permis' => $no_permis]);
    }

    // Mettre à jour un conducteur
    public function update(Conducteur $conducteur) : void {
        $this->bd->execSQL("UPDATE conducteur 
                          SET date_permis = :date_permis, 
                              nom = :nom, 
                              prenom = :prenom, 
                              mdp = :mdp 
                          WHERE no_permis = :no_permis",
                          [
                              ':no_permis' => $conducteur->getNoPermis(),
                              ':date_permis' => $conducteur->getDatePermis(),
                              ':nom' => $conducteur->getNom(),
                              ':prenom' => $conducteur->getPrenom(),
                              ':mdp' => $conducteur->getMdp()
                          ]);
    }

    private function loadQuery(array $result) : array {
        $conducteurs = [];
        foreach ($result as $row) {
            $conducteur = new Conducteur();
            $conducteur->setNoPermis($row['no_permis']);
            $conducteur->setDatePermis($row['date_permis']);
            $conducteur->setNom($row['nom']);
            $conducteur->setPrenom($row['prenom']);
            $conducteur->setMdp($row['mdp']);
            $conducteurs[] = $conducteur;
        }
        return $conducteurs;
    }

    public function getAll() : array {
        return $this->loadQuery($this->bd->execSQL($this->select));
    }

    public function getByNoPermis(?string $no_permis) : Conducteur {
        if (empty($no_permis)) {
            return new Conducteur(); // Retourne un objet vide si null ou vide
        }
        
        $req = $this->select . " WHERE no_permis = :no_permis";
        $result = $this->bd->execSQL($req, [':no_permis' => $no_permis]);
        $conducteurs = $this->loadQuery($result);
        return count($conducteurs) > 0 ? $conducteurs[0] : new Conducteur();
    }

    public function existe(string $no_permis) : bool {
        $req = "SELECT * FROM conducteur WHERE no_permis = :no_permis";
        $res = $this->loadQuery($this->bd->execSQL($req, [':no_permis' => $no_permis]));
        return (count($res) > 0);
    }
}