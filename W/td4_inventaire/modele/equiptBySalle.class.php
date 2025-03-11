<?php
require_once 'equipement.class.php';

class EquiptBySalle {
    private $numSalle;
    private $equipement;
    private $qte;

    public function __construct(string $numSalle = '', Equipement $equipement = null, int $qte = 0) {
        $this->numSalle = $numSalle;
        $this->equipement = $equipement;
        $this->qte = $qte;
    }

    // Getters and Setters
    public function getNumSalle() { return $this->numSalle; }
    public function setNumSalle($numSalle) { $this->numSalle = $numSalle; }

    public function getEquipement() { return $this->equipement; }
    public function setEquipement($equipement) { $this->equipement = $equipement; }

    public function getQte() { return $this->qte; }
    public function setQte($qte) { $this->qte = $qte; }
}
?>
