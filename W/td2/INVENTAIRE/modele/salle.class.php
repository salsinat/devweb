<?php
class Salle {
    private $num_salle;
    private $lib_salle;
    private $etage;

    function __construct(
        int $num_salle,
        string $lib_salle,
        int $etage
    ) {
        $this->num_salle = $num_salle;
        $this->lib_salle = $lib_salle;
        $this->etage = $etage;
    }

    // les setters et les getters
    function getNumSalle(): int {return $this->num_salle;}
    function setNumSalle(int $num_salle) {$this->num_salle = $num_salle;}
    function getLibSalle(): string {return $this->lib_salle;}
    function setLibSalle(string $lib_salle) {$this->lib_salle = $lib_salle;}
    function getEtage(): int {return $this->etage;}
    function setEtage(int $etage) {$this->etage = $etage;}
}

?>