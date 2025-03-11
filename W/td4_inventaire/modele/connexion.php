<?php
class Connexion {
    private $db;

    public function __construct() {
        $db_config = [
            'SGBD' => 'mysql',
            'HOST' => 'devbdd.iutmetz.univ-lorraine.fr',
            'DB_NAME' => 'guillera2u_salles',
            'USER' => 'guillera2u_appli',
            'PASSWORD' => '32229052'
        ];

        try {
            $this->db = new PDO($db_config['SGBD'] . ':host=' . $db_config['HOST'] . ';dbname=' . $db_config['DB_NAME'], $db_config['USER'], $db_config['PASSWORD'], [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ]);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

    public function execSQL(string $req, array $valeurs = []) {
        try {
            $stmt = $this->db->prepare($req);
            $stmt->execute($valeurs);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Query failed: ' . $e->getMessage());
        }
    }
}
?>
