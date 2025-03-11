<?php
require_once('Figure.php');

abstract class Polygone extends Figure {
    abstract function nombreDeCotes(): int;
}
?> 