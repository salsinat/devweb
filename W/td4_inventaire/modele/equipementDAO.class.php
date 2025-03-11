<?php
require_once 'connexion.php';
require_once 'equipement.class.php';

class EquipementDAO {
    private $bd;
    private $select;

    public function __construct() {
        $this->bd = new Connexion();
        $this->select = "SELECT id_equipt, lib_equipt, commentaire FROM TYPE_EQUIPT";
    }

    public function insert(Equipement $equipement) {
        $this->bd->execSQL("INSERT INTO TYPE_EQUIPT (id_equipt, lib_equipt, commentaire) VALUES (:id, :libelle, :commentaire)", [
            ':id' => $equipement->getId(),
            ':libelle' => $equipement->getLibelle(),
            ':commentaire' => $equipement->getCommentaire()
        ]);
    }

    public function delete(string $idEquipt) {
        $this->bd->execSQL("DELETE FROM TYPE_EQUIPT WHERE id_equipt = :id", [':id' => $idEquipt]);
    }

    public function update(Equipement $equipement) {
        $this->bd->execSQL("UPDATE TYPE_EQUIPT SET lib_equipt = :libelle, commentaire = :commentaire WHERE id_equipt = :id", [
            ':id' => $equipement->getId(),
            ':libelle' => $equipement->getLibelle(),
            ':commentaire' => $equipement->getCommentaire()
        ]);
    }

    private function loadQuery(array $result): array {
        $equipements = [];
        foreach ($result as $row) {
            $equipement = new Equipement();
            $equipement->setId($row['id_equipt']);
            $equipement->setLibelle($row['lib_equipt']);
            $equipement->setCommentaire($row['commentaire']);
            $equipements[] = $equipement;
        }
        return $equipements;
    }

    public function getAll(): array {
        return $this->loadQuery($this->bd->execSQL($this->select));
    }

    public function getById(string $id): Equipement {
        $unEquipement = new Equipement();
        $lesEquipements = $this->loadQuery($this->bd->execSQL($this->select . " WHERE id_equipt = :id", [':id' => $id]));
        if (count($lesEquipements) > 0) {
            $unEquipement = $lesEquipements[0];
        }
        return $unEquipement;
    }

    public function existe(string $id): bool {
        $req = "SELECT * FROM TYPE_EQUIPT WHERE id_equipt = :id";
        $res = $this->loadQuery($this->bd->execSQL($req, [':id' => $id]));
        return $res != [];
    }

    public function getNonInventaire(string $numSalle): array {
        $req = "SELECT * FROM TYPE_EQUIPT WHERE id_equipt NOT IN (SELECT id_equipt FROM CONTIENT WHERE num_salle = :numSalle)";
        return $this->loadQuery($this->bd->execSQL($req, [':numSalle' => $numSalle]));
    }
}
?>
