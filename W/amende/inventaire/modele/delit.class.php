<?php

class Delit {
    private $id_delit;
    private $nature;
    private $montant;

    // Constructeur
    public function __construct($id_delit = null, $nature = '', $montant = 0) {
        $this->id_delit = $id_delit;
        $this->nature = $nature;
        $this->montant = $montant;
    }

    // Getter et Setter pour chaque attribut
    public function getIdDelit() {
        return $this->id_delit;
    }

    public function setIdDelit($id_delit) {
        $this->id_delit = $id_delit;
    }

    public function getNature() {
        return $this->nature;
    }

    public function setNature($nature) {
        $this->nature = $nature;
    }

    public function getMontant() {
        return $this->montant;
    }

    public function setMontant($montant) {
        $this->montant = $montant;
    }
}

?>
