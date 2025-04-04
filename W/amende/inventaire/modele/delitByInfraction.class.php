<?php
require_once("../modele/delit.class.php");

class DelitByInfraction {
    private $id_inf;  // Identifiant de l'infraction
    private $id_delit;   // Délit associé à l'infraction

    // Constructeur
    function __construct(string $id_inf = '', Delit $id_delit = null) {
        $this->id_inf = $id_inf;
        $this->id_delit = $id_delit;
    }

    // Getters et Setters
    function getIdInf() : string {
        return $this->id_inf;
    }

    function setIdInf(string $id_inf) {
        $this->id_inf = $id_inf;
    }

    function getDelit() : Delit {
        return $this->id_delit;
    }

    function setDelit(Delit $id_delit) {
        $this->id_delit = $id_delit;
    }
}
?>
