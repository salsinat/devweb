<?php


class Conducteur {
    private $id_conducteur;
    private $no_permis;
    private $date_permis;
    private $nom;
    private $prenom;
    private $mdp;  // Mot de passe

    // Constructeur
    public function __construct($id_conducteur = null, $no_permis = '', $date_permis = '', $nom = '', $prenom = '', $mdp = '') {
        $this->id_conducteur = $id_conducteur;
        $this->no_permis = $no_permis;
        $this->date_permis = $date_permis;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mdp = $mdp;
    }

    // Getter et Setter pour chaque attribut
    public function getIdConducteur() {
        return $this->id_conducteur;
    }

    public function setIdConducteur($id_conducteur) {
        $this->id_conducteur = $id_conducteur;
    }

    public function getNoPermis() {
        return $this->no_permis;
    }

    public function setNoPermis($no_permis) {
        $this->no_permis = $no_permis;
    }

    public function getDatePermis() {
        return $this->date_permis;
    }

    public function setDatePermis($date_permis) {
        $this->date_permis = $date_permis;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }
}

?>
