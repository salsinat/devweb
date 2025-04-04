<?php
require_once("connexion.php");
require_once("infraction.class.php");

class InfractionDAO {
    private $bd;
    private $select;

    // Constructeur
    public function __construct() {
        $this->bd = new Connexion();
        // Mettre à jour la requête SELECT pour inclure 'nature' et 'montant'
        $this->select = 'SELECT id_inf, date_inf, no_immat, no_permis FROM infraction';
    }

    // Insérer une infraction
    public function insert(Infraction $infraction) : void {
        $this->bd->execSQL("INSERT INTO infraction (id_inf, date_inf, no_immat, no_permis)
                            VALUES (:id_inf, :date_inf, :no_immat, :no_permis)",
                            [
                                ':id_inf' => $infraction->getIdInf(),
                                ':date_inf' => $infraction->getDateInf(),
                                ':no_immat' => $infraction->getNoImmat(),
                                ':no_permis' => $infraction->getNoPermis(),
                               
                            ]);
    }

    // Supprimer une infraction
    public function delete(string $id_inf) : void {
        $this->bd->execSQL("DELETE FROM infraction WHERE id_inf = :id_inf", [':id_inf' => $id_inf]);
    }

    // Mettre à jour une infraction
    public function update(Infraction $infraction) : void {
        $this->bd->execSQL("UPDATE infraction 
                            SET date_inf = :date_inf, no_immat = :no_immat, no_permis = :no_permis
                            WHERE id_inf = :id_inf",
                            [
                                ':date_inf' => $infraction->getDateInf(),
                                ':no_immat' => $infraction->getNoImmat(),
                                ':no_permis' => $infraction->getNoPermis(),
                                ':id_inf' => $infraction->getIdInf()
                            ]);
    }

    // Charger les résultats d'une requête
    private function loadQuery(array $result) : array {
        $infractions = [];
        foreach($result as $row) {
            $infraction = new Infraction();
            $infraction->setIdInf($row['id_inf']);
            $infraction->setDateInf($row['date_inf']);
            $infraction->setNoImmat($row['no_immat']);
            $infraction->setNoPermis($row['no_permis']);
            $infractions[] = $infraction;
        }
        return $infractions;
    }

    // Récupérer toutes les infractions
    public function getAll() : array {
        return $this->loadQuery($this->bd->execSQL($this->select));
    }

    // Récupérer une infraction par son ID
    public function getByIdInf(string $id_inf) : Infraction {
        $infraction = new Infraction();
        $infractions = $this->loadQuery($this->bd->execSQL($this->select . " WHERE id_inf = :id_inf", [':id_inf' => $id_inf]));
        if (count($infractions) > 0) {
            $infraction = $infractions[0];
        }
        return $infraction;
    }

    public function getByNoPermis(string $no_permis) : array {
        return $this->loadQuery($this->bd->execSQL($this->select . " WHERE no_permis = :no_permis", [':no_permis' => $no_permis]));
    }

    public function getNextIdInf() : string {
        $req = "SELECT MAX(id_inf) AS max_id FROM infraction";
        $res = $this->bd->execSQL($req);
        return ($res[0]['max_id'] > 0) ? $res[0]['max_id'] + 1 : '1';
    }

    // Vérifier si une infraction existe
    public function existe(string $id_inf) : bool {
        $req = "SELECT * FROM infraction WHERE id_inf = :id_inf";
        $res = $this->loadQuery($this->bd->execSQL($req, [':id_inf' => $id_inf]));
        return (count($res) > 0);
    }
}
?>
