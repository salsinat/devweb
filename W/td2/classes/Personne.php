<?php
class Personne {
    private $nom;
    private $prenom;
    private $age;
    private $sexe; // H ou F

    function __construct(string $unNom = "Dupont",
                         string $unPrenom = "Pierre",
                         int $uneAge = 20,
                         string $unSexe = "I") {
        $this->nom = $unNom;
        $this->prenom = $unPrenom;
        $this->age = $uneAge;
        $this->sexe = $unSexe;
    }

    // getters et setters
    function getNom() { return $this->nom; }
    function getPrenom() { return $this->prenom; }
    function getAge() { return $this->age; }
    function getSexe() { return $this->sexe; }
    function setNom( string $unNom ) { $this->nom = $unNom; }
    function setPrenom( string $unPrenom ) { $this->prenom = $unPrenom; }
    function setAge( int $unAge ) { $this->age = $unAge; }
    function setSexe( string $unSexe ) { $this->sexe = $unSexe; }

    // méthodes 
    function __toString() {
        $chaine = strtoupper($this->nom)." ".$this->prenom.", ".$this->age." an";
        if ($this->age > 1) {$chaine .= "s";}
        $chaine .= ", ";
        switch ($this->sexe) {
            case "H":
                $chaine .= "homme";
                break;
            case "F":
                $chaine .= "femme";
                break;
            default:
                $chaine .= "sexe inconnu";
                break;
        }
        return $chaine;
    }
}
?>