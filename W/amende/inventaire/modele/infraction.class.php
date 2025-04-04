<?php
class Infraction
{
    private $idInf;
    private $dateInf;
    private $noImmat;
    private $noPermis;
    private $nature; // Nature de l'infraction
    private $montant; // Montant de l'amende

    public function __construct($idInf = '', $dateInf = '', $noImmat = '', $noPermis = '', $nature = '', $montant = 0)
    {
        $this->idInf = $idInf;
        $this->dateInf = $dateInf;
        $this->noImmat = $noImmat;
        $this->noPermis = $noPermis;
    
    }

    public function getIdInf() { return $this->idInf; }
    public function setIdInf($idInf) { $this->idInf = $idInf; }

    public function getDateInf() { return $this->dateInf; }
    public function setDateInf($dateInf) { $this->dateInf = $dateInf; }

    public function getNoImmat() { return $this->noImmat; }
    public function setNoImmat($noImmat) { $this->noImmat = $noImmat; }

    public function getNoPermis() { return $this->noPermis; }
    public function setNoPermis($noPermis) { $this->noPermis = $noPermis; }
}


?>
