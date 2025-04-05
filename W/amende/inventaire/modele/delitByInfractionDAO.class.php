<?php
require_once("connexion.php");
require_once("delitByInfraction.class.php");
require_once("delitDAO.class.php");

class DelitByInfractionDAO {
    private $bd;
    private $select;

    // Constructeur
    function __construct() {
        $this->bd = new Connexion();  // Connexion à la base de données
        $this->select = 'SELECT id_inf, id_delit FROM comprend';  // Requête de base pour la table comprend
    }

    // Insérer une relation entre une infraction et un délit
    function insert(DelitByInfraction $delitByInfraction) : void {
        $this->bd->execSQL("INSERT INTO comprend (id_inf, id_delit) 
                            VALUES (:id_inf, :id_delit)",
                            [':id_inf' => $delitByInfraction->getIdInf(), 
                             ':id_delit' => $delitByInfraction->getDelit()->getIdDelit()]);
    }

    // Supprimer une relation par id_inf et id_delit
    function deleteByIdInfAndIdDelit(string $id_inf, string $id_delit) : void {
        $this->bd->execSQL("DELETE FROM comprend WHERE id_inf = :id_inf AND id_delit = :id_delit",
                            [':id_inf' => $id_inf, ':id_delit' => $id_delit]);
    }

    // Supprimer toutes les relations pour une infraction donnée
    function deleteByIdInf(string $id_inf) : void {
        $this->bd->execSQL("DELETE FROM comprend WHERE id_inf = :id_inf",
                            [':id_inf' => $id_inf]);
    }

    // Supprimer toutes les relations pour un délit donné
    function deleteByIdDelit(string $id_delit) : void {
        $this->bd->execSQL("DELETE FROM comprend WHERE id_delit = :id_delit",
                            [':id_delit' => $id_delit]);
    }

    // Mettre à jour une relation entre une infraction et un délit
    function update(DelitByInfraction $delitByInfraction) : void {
        $this->bd->execSQL("UPDATE comprend 
                            SET id_delit = :id_delit 
                            WHERE id_inf = :id_inf",
                            [':id_delit' => $delitByInfraction->getDelit()->getIdDelit(),
                             ':id_inf' => $delitByInfraction->getIdInf()]);
    }

    // Charger les résultats d'une requête
    private function loadQuery(array $result) : array {
        $delitDAO = new DelitDAO();
        $delitByInfractions = [];
        foreach ($result as $row) {
            $delit = $delitDAO->getByIdDelit($row['id_delit']);
            $delitByInfractions[] = new DelitByInfraction($row['id_inf'], $delit);
        }
        return $delitByInfractions;
    }

    // Récupérer toutes les relations entre infractions et délits
    function getAll() : array {
        return $this->loadQuery($this->bd->execSQL($this->select));
    }

    // Récupérer toutes les relations pour une infraction donnée
    function getByIdInf(string $id_inf) : array {
        return $this->loadQuery($this->bd->execSQL($this->select . " WHERE id_inf = :id_inf", [':id_inf' => $id_inf]));
    }

    // Récupérer une relation spécifique entre une infraction et un délit
    function getByIdInfAndIdDelit(string $id_inf, string $id_delit) : DelitByInfraction {
        return $this->loadQuery($this->bd->execSQL($this->select . " WHERE id_inf = :id_inf AND id_delit = :id_delit",
                                                   [':id_inf' => $id_inf, ':id_delit' => $id_delit]))[0];
    }

    
}
?>
