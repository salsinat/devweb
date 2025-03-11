<?php
class Equipement {
    private $id;
    private $libelle;
    private $commentaire;

    public function __construct(string $id = '', string $libelle = '', string $commentaire = '') {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->commentaire = $commentaire;
    }

    // Getters and Setters
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getLibelle() { return $this->libelle; }
    public function setLibelle($libelle) { $this->libelle = $libelle; }

    public function getCommentaire() { return $this->commentaire; }
    public function setCommentaire($commentaire) { $this->commentaire = $commentaire; }
}
?>
