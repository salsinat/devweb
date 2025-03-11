<?php
require_once('Personne.php');

class Etudiant extends Personne {
    private $notes = [];

    function addNote(float $note) {
        $this->notes[] = $note;
    }

    function afficheNotes() {
        echo "Notes de ".$this->getNom()." ".$this->getPrenom().": ";
        foreach ($this->notes as $note) {
            echo $note." ";
        }
    }

    function getMoyenne() {
        $somme = 0;
        foreach ($this->notes as $note) {
            $somme += $note;
        }
        return $somme / count($this->notes);
    }

    function __toString() {
        $chaine = parent::__toString();
        if (count($this->notes) > 0)  { $chaine .= ", Moyenne : ".$this->getMoyenne(); }
        return $chaine;
    }
}
?>