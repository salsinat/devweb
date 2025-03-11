<?php
require_once('Figure.php');

class Cercle extends Figure {
    private $rayon;

    function __construct(int $rayon) {
        $this->rayon = $rayon;
    }
    
    function getRayon():int { return $this->rayon; }
    function setRayon(int $rayon) { $this->rayon = $rayon; }

    function aire(): float { return $this->rayon * $this->rayon * 3.14; }
}
?>