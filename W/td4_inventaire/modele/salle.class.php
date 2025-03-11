<?php
class Salle {
    private $num;
    private $libelle;
    private $etage;

    public function __construct(string $num = '', string $libelle = '', string $etage = '') {
        $this->num = $num;
        $this->libelle = $libelle;
        $this->etage = $etage;
    }

    // Getters and Setters
    public function getNum() { return $this->num; }
    public function setNum($num) { $this->num = $num; }

    public function getLibelle() { return $this->libelle; }
    public function setLibelle($libelle) { $this->libelle = $libelle; }

    public function getEtage() { return $this->etage; }
    public function setEtage($etage) { $this->etage = $etage; }
}
?>
