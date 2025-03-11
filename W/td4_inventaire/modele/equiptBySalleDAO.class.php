<?php
require_once 'connexion.php';
require_once 'equiptBySalle.class.php';
require_once 'equipementDAO.class.php';

class EquiptBySalleDAO {
    private $bd;
    private $select;

    public function __construct() {
        $this->bd = new Connexion();
        $this->select = "SELECT num_salle, id_equipt, qte FROM CONTIENT";
    }

    public function insert(EquiptBySalle $equiptBySalle) {
        $this->bd->execSQL("INSERT INTO CONTIENT (num_salle, id_equipt, qte) VALUES (:numSalle, :idEquipt, :qte)", [
            ':numSalle' => $equiptBySalle->getNumSalle(),
            ':idEquipt' => $equiptBySalle->getEquipement()->getId(),
            ':qte' => $equiptBySalle->getQte()
        ]);
    }

    public function deleteByNumSalleByIdEquipt(string $numSalle, string $idEquipt) {
        $this->bd->execSQL("DELETE FROM CONTIENT WHERE num_salle = :numSalle AND id_equipt = :idEquipt", [
            ':numSalle' => $numSalle,
            ':idEquipt' => $idEquipt
        ]);
    }

    public function deleteByNumSalle(string $numSalle) {
        $this->bd->execSQL("DELETE FROM CONTIENT WHERE num_salle = :numSalle", [':numSalle' => $numSalle]);
    }

    public function update(EquiptBySalle $equiptBySalle) {
        $this->bd->execSQL("UPDATE CONTIENT SET qte = :qte WHERE num_salle = :numSalle AND id_equipt = :idEquipt", [
            ':numSalle' => $equiptBySalle->getNumSalle(),
            ':idEquipt' => $equiptBySalle->getEquipement()->getId(),
            ':qte' => $equiptBySalle->getQte()
        ]);
    }

    private function loadQuery(array $result): array {
        $equipementDAO = new EquipementDAO();
        $lesEquiptBySalle = [];
        foreach ($result as $row) {
            $equipement = $equipementDAO->getById($row['id_equipt']);
            $lesEquiptBySalle[] = new EquiptBySalle($row['num_salle'], $equipement, $row['qte']);
        }
        return $lesEquiptBySalle;
    }

    public function getAll(): array {
        return $this->loadQuery($this->bd->execSQL($this->select));
    }

    public function getByNumSalle(string $numSalle): array {
        return $this->loadQuery($this->bd->execSQL($this->select . " WHERE num_salle = :numSalle", [':numSalle' => $numSalle]));
    }

    public function getByNumSalleByIdEquipt(string $numSalle, string $idEquipt): EquiptBySalle {
        $unEquiptBySalle = new EquiptBySalle();
        $lesEquiptBySalle = $this->loadQuery($this->bd->execSQL($this->select . " WHERE num_salle = :numSalle AND id_equipt = :idEquipt", [
            ':numSalle' => $numSalle,
            ':idEquipt' => $idEquipt
        ]));
        if (count($lesEquiptBySalle) > 0) {
            $unEquiptBySalle = $lesEquiptBySalle[0];
        }
        return $unEquiptBySalle;
    }

    public function existe(string $numSalle, string $idEquipt): bool {
        $req = "SELECT * FROM CONTIENT WHERE num_salle = :numSalle AND id_equipt = :idEquipt";
        $res = $this->loadQuery($this->bd->execSQL($req, [
            ':numSalle' => $numSalle,
            ':idEquipt' => $idEquipt
        ]));
        return $res != [];
    }
}
?>
