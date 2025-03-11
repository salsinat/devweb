<?php
require_once('Polygone.php');

class Rectangle extends Polygone {
    private $largeur;
    private $longueur;

    function __construct(int $largeur, int $longueur) {
        $this->longueur = $longueur;
        $this->largeur = $largeur;
    }
    
    function getLongueur(): int { return $this->longueur; }
    function getLargeur():int { return $this->largeur; }
    function setLongueur(int $longueur) { $this->longueur = $longueur; }
    function setLargeur(int $largeur) { $this->largeur = $largeur; }

    function nombreDeCotes(): int { return 4; }

    function aire(): float { return $this->largeur * $this->longueur; }
}
?>