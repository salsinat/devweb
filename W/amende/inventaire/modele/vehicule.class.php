<?php

class Vehicule {
    private $no_immat;
    private $date_immat;
    private $modele;
    private $marque;
    private $no_permis;

    // Constructeur
    public function __construct($no_immat = null, $date_immat = '', $modele = '', $marque = '', $no_permis = '') {
        $this->no_immat = $no_immat;
        $this->date_immat = $date_immat;
        $this->modele = $modele;
        $this->marque = $marque;
        $this->no_permis = $no_permis;
    }

    // Getters et Setters pour chaque attribut
    public function getNoImmat() {
        return $this->no_immat;
    }

    public function setNoImmat($no_immat) {
        $this->no_immat = $no_immat;
    }

    public function getDateImmat() {
        return $this->date_immat;
    }

    public function setDateImmat($date_immat) {
        $this->date_immat = $date_immat;
    }

    public function getModele() {
        return $this->modele;
    }

    public function setModele($modele) {
        $this->modele = $modele;
    }

    public function getMarque() {
        return $this->marque;
    }

    public function setMarque($marque) {
        $this->marque = $marque;
    }

    public function getNoPermis() {
        return $this->no_permis;
    }

    public function setNoPermis($no_permis) {
        $this->no_permis = $no_permis;
    }
}

?>
