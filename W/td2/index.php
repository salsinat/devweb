<?php
require_once('classes/Personne.php');
require_once('classes/Etudiant.php');
require_once('classes/Promotion.php');
require_once('figures/Cercle.php');
require_once('figures/Triangle.php');
require_once('figures/Rectangle.php');

echo "<h1>Exercice 1</h1>";

$personne1 = new Personne("Dupont", "Pierre", 20, "H");
$personne2 = new Personne("Durand", "Paul", 25);
$personne3 = new Personne("Dufour", "Micheline", 30, "F");
echo $personne1."<br>";
echo $personne2."<br>";
echo $personne3."<br>";

$etudiant1 = new Etudiant("Dupont", "Pierre", 20, "H");
$etudiant2 = new Etudiant("Durand", "Paul", 25);

echo "<br>-- Après création, sans aucune saisie --<br>";
echo $etudiant1."<br>";
echo $etudiant2."<br><br>";

echo "-- Après ajoue des notes de ".$etudiant1->getPrenom()." --<br>";
$etudiant1->addNote(10);
$etudiant1->addNote(20);
$etudiant1->addNote(15);
echo $etudiant1->afficheNotes()."<br>";
echo $etudiant1."<br><br>";

echo "-- Après ajoue des notes de ".$etudiant2->getPrenom()." --<br>";
$etudiant2->addNote(19.5);
$etudiant2->addNote(2);
$etudiant2->addNote(4.3);
echo $etudiant2->afficheNotes()."<br>";
echo $etudiant2."<br><br>";

$promo = new Promotion("BUT 2 info 2024 2025");
$promo->addEtudiant($etudiant1);
$promo->addEtudiant($etudiant2);

echo "<h1>".$promo->getLibelle()."</h1>";
echo "<table> <tr> <th> Nom </th> <th> Prénom </th> <th> Age </th> <th> Sexe </th> <th> Moyenne </th> </tr>";
foreach ($promo->getEtudiants() as $etudiant) {
    echo "<tr> <td>".$etudiant->getNom()."</td> <td>".$etudiant->getPrenom()."</td> <td>".$etudiant->getAge()."</td> <td>".$etudiant->getSexe()."</td> <td>".$etudiant->getMoyenne()."</td> </tr>";
}
echo "<tr> <td colspan=\"4\"> Moyenne de la promotion </td> <td>".$promo->getMoyenne()."</td> </tr>";
echo "</table><br>";

echo "-- Recherche d'étudiant --";
$unNom = "Skywalker"; $unPrenom = "Luke";
$etu = $promo->getEtudiant($unNom,$unPrenom);
echo "<br><br>".$unNom." ".$unPrenom."<br>";
echo $etu === null? "L'étudiant ".$unNom." ".$unPrenom." n'existe pas dans la base." : $etu;
$unNom = "Dupont"; $unPrenom = "Pierre";
$etu = $promo->getEtudiant($unNom,$unPrenom);
echo "<br><br>".$unNom." ".$unPrenom."<br>";
echo $etu === null? "L'étudiant ".$unNom." ".$unPrenom." n'existe pas dans la base." : $etu;

echo "<br><br>";
echo "Triangle <br>";
$triangle = new Triangle(5,7);
echo "base = ".$triangle->getBase()." hauteur = ".$triangle->getHauteur()."<br>";
echo "Le nombre de cotés est : ".$triangle->nombreDeCotes()."<br>";
echo "L'aire du triangle est : ".$triangle->aire()."<br>";

echo "<br><br>";
echo "Rectangle <br>";
$rectangle = new Rectangle(5,7);
echo "largeur = ".$rectangle->getLargeur()." longueur = ".$rectangle->getLongueur()."<br>";
echo "Le nombre de cotés est : ".$rectangle->nombreDeCotes()."<br>";
echo "L'aire du rectangle est : ".$rectangle->aire()."<br>";

echo "<br><br>";
echo "Cercle <br>";
$cercle = new Cercle(5);
echo "rayon = ".$cercle->getRayon()."<br>";
echo "L'aire du cercle est : ".$cercle->aire()."<br>";
?>