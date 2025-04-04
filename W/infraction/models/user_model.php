<?php
class UserModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function authenticate($num_permis, $mot_de_passe) {
        $stmt = $this->pdo->prepare("SELECT * FROM CONDUCTEUR WHERE num_permis = ? AND mot_de_passe = ?");
        $stmt->execute([$num_permis, $mot_de_passe]);
        return $stmt->fetch();
    }
}
?>
