<?php
require_once('equipement.class.php');

class EquipementBySalle {
    private $num_salle;
    private $equipt;
    private $qte;

    function __construct(
        int $num_salle,
        Equipement $equipt,
        int $qte
    ) {
        $this->num_salle = $num_salle;
        $this->equipt = $equipt;
        $this->qte = $qte;
    }

    //getters et setters
    function getNumSalle(): int {return $this->num_salle;}
    function setNumSalle(int $num_salle) {$this->num_salle = $num_salle;}
    function getEquipement(): Equipement {return $this->equipt;}
    function setEquipement(Equipement $equipt) {$this->equipt = $equipt;}
}
?>