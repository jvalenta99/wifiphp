<?php

/**
 * Hero erbt von Character
 * Mit extends kann angegeben werden, von welcher Klasse geerbt wird.
 * Es kann nur von einer Klasse geerbt werden.
 * 
 * In einer abgeleiteten Klasse werden nur die Unterschiede zur Elternklasse deklariert.
 * Dies können Attribute, aber auch Methoden sein.
 */
class Hero extends Character {
    protected $arrows;

    /*
        Wird von einer Klasse mit einem Konstruktor geerbt, muss dieser auch aufgerufen werden.
        Der neue Konstruktor muss die Möglichkeit bieten, die Parameter des 
        Elternklassen-Konstruktors zu befüllen.
    */
    public function __construct(string $name, int $life, int $strength, array $maxSteps = [], int $arrows = 5) {
        // der Konstruktor der Elternklasse wird aufgerufen
        parent::__construct($name, $life, $strength, $maxSteps);
        $this->arrows = $arrows;
    }

    public function shootArrow() {
        if ($this->arrows > 0) {
            $this->arrows--;
            echo $this->name . 
                ' shot an arrow. ' . 
                $this->arrows . 
                ' arrows left. <br>';
        }
        else {
           echo $this->name . ' cannot shoot an arrow, none left!';
        }
    }

    /*
        Methoden können in den ageleiteten Klassen überschrieben werden. Beim Aufruf wird
        die() dieser Klasse aufgerufen.
    */
    protected function die() {
        echo 'Hero ' . $this->name . ' died! The game is over!';
    }
}