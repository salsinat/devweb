<?php 
echo "<h1>Exercice 1</h1>";
function suite(int $n) {
    $u0 = 0;
    $u1 = 1;
    for ($i=0; $i<$n; $i+=1) {
        if ($i == 0) {
            echo $u0."<br/>";
        } else if ($i == 1) {
            echo $u1."<br/>";
        } else {
            $un = 3*$u1 + $u0;
            echo $un."<br/>";
            $u0 = $u1;
            $u1 = $un;
        }
    }
}

suite(6);

echo "<h1>Exercice 2</h1>";

function CompteMots(string $phrase) {
    $mots = explode(' ', strtolower(trim($phrase)));
    $compteur = array();
    foreach($mots as $mot) {
        if(!key_exists($mot,$compteur)) {
            $compteur[$mot] = 1;
        } else {
            $compteur[$mot] += 1;
        }
    }
    return $compteur;
}

echo "<table border=\"1\"><tbody>";
foreach(CompteMots("Un exemple de phrase comportant un ensemble de mots") as $cle => $valeur) {
    echo "<tr><td>". $cle. "</td><td>". $valeur. "</td></tr>";
};
echo "</table></tbody>";

echo "<h1>Probleme</h1>";
echo "<h2>Produit</h2>";
class Produit {
    private string $code;
    private string $libelle;
    private float $tarif;

    function __construct($code, $libelle, $tarif) {
        $this->code = $code;
        $this->libelle = $libelle;
        $this->tarif = $tarif;
    }

    //getters et setters
    function getCode(): string {return $this->code;}
    function setCode(string $code) {$this->code = $code;}
    function getLibelle(): string {return $this->libelle;}
    function setLibelle(string $libelle) {$this->libelle = $libelle;}
    function getTarif(): float {return $this->tarif;}
    function setTarif(float $tarif) {$this->tarif = $tarif;}

    function __toString() {
        return $this->getCode()." - ".$this->getLibelle()." - ".number_format($this->getTarif(),2)." €";
    }
}

$prod = new Produit("DGCOD","clavier digicode",50);
echo $prod;

echo "<h2>Ligne</h2>";
class Ligne {
    private Produit $produit;
    private int $quantite;
    private int $taux;

    function __construct($produit, $quantite, $taux) {
        $this->produit = $produit;
        $this->quantite = $quantite;
        $this->taux = $taux;
    }

    //getters
    function getProduit(): Produit {return $this->produit;}
    function getTauxRemise(): int {return $this->taux;}
    function getQte(): int {return $this->quantite;}

    function getRemise(): float {
        return $this->getQte()*$this->produit->getTarif()*$this->getTauxRemise()/100;
    }

    function getMt(): float {
        return $this->getQte()*$this->produit->getTarif()-$this->getRemise();
    }

    function affiche(): void {
        echo "<tr>";
        echo "<td>".$this->getProduit()->getCode()."</td>";
        echo "<td>".$this->getProduit()->getLibelle()."</td>";
        echo "<td>".$this->getProduit()->getTarif()."</td>";
        echo "<td>".$this->getTauxRemise()."%</td>";
        echo "<td>".$this->getQte()."</td>";
        echo "<td>".number_format($this->getMt(),2)."€</td>";
        echo "</tr>";
    }
}

$prod2= new Produit("DTCOUV","détecteur d’ouverture",40);
$ligne = new Ligne($prod2,4,10);
echo "<table border=\"1\">";
$ligne->affiche();
echo "</table>";

echo "<h2>Facture</h2>";
class Facture {
    private $lignes = array();
    private int $frais;

    function __construct(int $frais) {
        $this->frais = $frais;
    }

    function addLigne(Ligne $ligne) {
        array_push($this->lignes,$ligne);
    }

    function getLignes(): array {
        return $this->lignes;
    }

    function getFrais(): int {
        return $this->frais;
    }

    function getMontant(): float {
        $mt = 0;
        foreach($this->lignes as $ligne) {
            $mt += $ligne->getMt();
        }
        return $mt + $this->getFrais();
    }

    function affiche(): void {
        //avec des lignes solides
        echo "<table border=\"1\">";
        foreach($this->lignes as $ligne) {
            $ligne->affiche();
        }
        echo "<tr>";
        echo "<td colspan=\"5\">Frais de livraison</td>";
        echo "<td>".number_format($this->getFrais(),2)."€</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan=\"5\">Montant de l'intervention</td>";
        echo "<td>".number_format($this->getMontant(),2)."€</td>";
        echo "</tr>";
        echo "</table>";
    }
}

$ligne1 = new Ligne($prod,1,20);

$facture = new Facture(20);
$facture->addLigne($ligne1);
$facture->addLigne($ligne);
$facture->affiche();
?>