<?php

class Chat {
    const JEUNE = 1;
    const ADO = 4;
    const ADULTE = 7;

    private static $nbPattes = 4;
    private $age;
    private $couleur;

    public static function miaule(): void {
        echo 'Miaou miaou miaou...<br />';
    }

    function __construct($ageChat, $couleur="roux") {
        if (in_array($ageChat, [self::JEUNE, self::ADO, self::ADULTE])) {
            $this->age = $ageChat; // ou en utilisant une fonction setter
        }
    }

    function __toString() {
        return "Je suis $this->couleur, j'ai $this->age an(s) et j'ai ".self::$nbPattes." pattes.";
    }
}

?>