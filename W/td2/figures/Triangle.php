<?php
require_once('Polygone.php');

class Triangle extends Polygone {
    private $base;
    private $hauteur;

    function __construct(int $base, int $hauteur) {
        $this->hauteur = $hauteur;
        $this->base = $base;
    }
    
    function getHauteur(): int { return $this->hauteur; }
    function getBase(): int { return $this->base; }
    function setHauteur(int $hauteur) { $this->hauteur = $hauteur; }
    function setBase(int $base) { $this->base = $base; }

    function nombreDeCotes(): int { return 3; }

    function aire(): float { return $this->base * $this->hauteur / 2; }
}
?>