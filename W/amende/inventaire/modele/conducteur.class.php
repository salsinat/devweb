<?php





    class Conducteur {
        private $no_permis; // Garder no_permis (pas num_permis)
        private $date_permis;
        private $nom;
        private $prenom;
        private $mdp;

            // Constructeur
    public function __construct($no_permis = '', $date_permis = '', $nom = '', $prenom = '', $mdp = '') {
        $this->no_permis = $no_permis;
        $this->date_permis = $date_permis;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mdp = $mdp;
    }
    
        public function getNoPermis() : string {
            return $this->no_permis;
        }

    public function setNoPermis($no_permis) {
        $this->no_permis = $no_permis;
    }

    public function getDatePermis() {
        return $this->date_permis;
    }

    public function setDatePermis($date_permis) {
        $this->date_permis = $date_permis;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }
}

?>
