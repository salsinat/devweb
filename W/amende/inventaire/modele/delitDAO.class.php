<?php

require_once("connexion.php");
require_once("delit.class.php");

class DelitDAO {
    private $bd;
    private $select;

    // Constructeur
    public function __construct() {
        $this->bd = new Connexion();  // Assurez-vous que la classe Connexion gère bien la connexion à la BDD
        $this->select = 'SELECT id_delit, nature, montant FROM delit';
    }

    // Insérer un délit
    public function insert(Delit $delit) : void {
        $this->bd->execSQL("INSERT INTO delit (id_delit, nature, montant)
                            VALUES (:id_delit, :nature, :montant)",
                            [
                                ':id_delit' => $delit->getIdDelit(),
                                ':nature' => $delit->getNature(),
                                ':montant' => $delit->getMontant()
                            ]);
    }

    // Supprimer un délit
    public function delete(string $id_delit) : void {
        $this->bd->execSQL("DELETE FROM delit WHERE id_delit = :id_delit", [':id_delit' => $id_delit]);
    }

    // Mettre à jour un délit
    public function update(Delit $delit) : void {
        $this->bd->execSQL("UPDATE delit 
                            SET nature = :nature, montant = :montant 
                            WHERE id_delit = :id_delit",
                            [
                                ':nature' => $delit->getNature(),
                                ':montant' => $delit->getMontant(),
                                ':id_delit' => $delit->getIdDelit()
                            ]);
    }

    // Charger les résultats d'une requête
    private function loadQuery(array $result) : array {
        $delits = [];
        foreach ($result as $row) {
            $delit = new Delit();
            $delit->setIdDelit($row['id_delit']);
            $delit->setNature($row['nature']);
            $delit->setMontant($row['montant']);
            $delits[] = $delit;
        }
        return $delits;
    }

    // Récupérer tous les délits
    public function getAll() : array {
        return $this->loadQuery($this->bd->execSQL($this->select));
    }

    // Récupérer un délit par son ID
    public function getByIdDelit(string $id_delit) : Delit {
        $delit = new Delit();
        $delits = $this->loadQuery($this->bd->execSQL($this->select . " WHERE id_delit = :id_delit", [':id_delit' => $id_delit]));
        if (count($delits) > 0) {
            $delit = $delits[0];
        }
        return $delit;
    }

    // Vérifier si un délit existe
    public function existe(string $id_delit) : bool {
        $req = "SELECT * FROM delit WHERE id_delit = :id_delit";
        $res = $this->loadQuery($this->bd->execSQL($req, [':id_delit' => $id_delit]));
        return (count($res) > 0);
    }
}

?>
