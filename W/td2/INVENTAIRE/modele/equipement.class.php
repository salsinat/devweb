<?php
class Equipement {
    private $id_equipt;
    private $lib_equipt;
    private $commentaire;

    function __construct(
        int $id_equipt,
        string $lib_equipt,
        string $commentaire
    ) {
        $this->id_equipt = $id_equipt;
        $this->lib_equipt = $lib_equipt;
        $this->commentaire = $commentaire;
    }

    //getters et setters
    function getIdEquipt(): int {return $this->id_equipt;}
    function setIdEquipt(int $id_equipt) {$this->id_equipt = $id_equipt;}
    function getLibEquipt(): string {return $this->lib_equipt;}
    function setLibEquipt(string $lib_equipt) {$this->lib_equipt = $lib_equipt;}
    function getCommentaire(): string {return $this->commentaire;}
    function setCommentaire(string $commentaire) {$this->commentaire = $commentaire;}
}
?>