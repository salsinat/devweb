<?php
abstract class ClasseMere {
    
    // propriété protégée
    protected $x ;
    
    // méthodes pour accéder à la propriété protégée :
    public function valeur(){
        return $this->x;
    }
    
    abstract public function affectation($valeur);

}

// définition d'une classe fille

class ClasseFille extends ClasseMere {
    
    // implémentation de la méthode abstraite :
    public function affectation($valeur){
        $this->x = $valeur;
    }

}

?>