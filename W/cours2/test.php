<?php
require personne.class.php;
require chat.class.php;
require classeMereFille.class.php;

// tests personnes

$pers1 = new Personne();
echo $pers1;
echo $pers1->getNom();
$pers1->setNom("Petit");
echo $pers1->getNom();

$pers2 = new Personne("Petit", "Jean");
echo $pers2;

$etud = new Etudiant("Grand", "Pierre", "IUT de Metz");
echo $etud->info();
// => Pierre GRAND IUT de Metz

// tests chats

// echo Chat::$nbPattes => erreur (private)
Chat::miaule();
// => Miaou miaou miaou...

$monChat = new Chat(Chat::JEUNE);
// $monChat = new Chat(Chat::SENIOR); erreur

$maChatte = new Chat(Chat::ADO, 'noir');
echo $maChatte;
// => Je suis noir, j’ai 4 an(s) et j'ai 4 pattes.

$tonChat = new Chat(Chat::JEUNE);
echo $tonChat;
// => Je suis roux, j’ai 1 an(s) et j'ai 4 pattes.

$tonChat->miaule();
// => Miaou miaou miaou...

// $unChat = new Chat(Chat::VIEUX);
// echo $unChat; => erreur

// tests classe mere fille

$objet = new ClasseFille();
$objet->affectation(2023);
echo $objet->valeur();
// => 2023
?>