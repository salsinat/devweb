<?php
class Personne {

    // dfinition des propriétés
    private $nom;
    private $prenom;

    //définition des méthodes
    function __construct(string $unNom = "Dupont",
                         string $unPrenom = "Pierre") {
        $this->nom = $unNom;
        $this->prenom = $unPrenom;
    }

    function __toString() {
        return $this->prenom." ".strtoupper($this->nom);
    }

    function getNom(): string {
        return $this->nom;
    }

    function setNom(string $unNom): void {
        $this->nom = $unNom;        
    }

    function info(): string {
        return $this->prenom." ".strtoupper($this->nom);
    }
}

class Etudiant extends Personne {

    // propriété supplémentaire
    private $etablissement;

    // constructeur de la classe fille
    function __construct (string $nom = "Dupont",
                          string $prenom = "Pierre",
                          string $etablissement) {
        parent::__construct($nom, $prenom);
        $this -> etablissement = $etablissement;
    }

    // méthode supplémentaire
    function setEtablissement (string $etablissement) {
        $this -> etablissement = $etablissement;
    }

    // redéfinition d'une méthode dans la classe Fille
    function info () : string {
        return parent::info().' '.$this -> etablissement ;
    }
}
?>