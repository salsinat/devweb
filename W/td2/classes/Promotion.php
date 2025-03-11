<?php
require_once('classes/Etudiant.php');

class Promotion {
    private $libelle;
    private $etudiants;

    public function __construct(string $unLibelle) {
        $this->libelle = $unLibelle;
        $this->etudiants = array();
    }

    //getters
    function getLibelle() { return $this->libelle; }
    function getEtudiants() { return $this->etudiants; }

    public function addEtudiant(Etudiant $unEtudiant) {
        $this->etudiants[] = $unEtudiant;
    }

    public function getNombreEtudiants() {
        return count($this->etudiants);
    }

    public function getMoyenne() {
        $somme = 0;
        foreach ($this->etudiants as $etudiant) {
            $somme += $etudiant->getMoyenne();
        }
        return $somme / count($this->etudiants);
    }

    public function getEtudiant(string $unNom, string $unPrenom) {
        foreach ($this->etudiants as $etudiant) {
            if ($etudiant->getNom() == $unNom && $etudiant->getPrenom() == $unPrenom) {
                return $etudiant;
            }
        }
        return null;
    }
}