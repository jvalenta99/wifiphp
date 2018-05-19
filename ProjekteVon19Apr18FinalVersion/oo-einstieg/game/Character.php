<?php

class Character {
    /* 
        Sichtbarkeit von Attributen/Methoden
        public -> wir können über das Objekt darauf zugreifen
        protected, private erlauben nur Klasseninterne Verwendung
    */
    protected $name;
    protected $life;
    protected $strength;
    protected $maxSteps = [
        'x' => 1,
        'y' => 1
    ];
    protected $position = [
        'x' => 0,
        'y' => 0
    ];

    /* 
        Konstruktor
        Magische Funktion, wird, wenn vorhanden, automatisch beim 
        Erstellen eines neuen Objekts aufgerufen.

        Attribute können über Konstruktor initialisiert werden, dh. 
        die Member werden mit Anfangswerten befüllt.

        NEU: Der Datentyp der erwarteten Arguments kann angegeben werden
    */
    public function __construct(string $name, int $life, int $strength, array $maxSteps=[]) {
        $this->name = $name;
        $this->life = $life;
        $this->strength = $strength;

        // prüfen, ob maxSteps Werte beinhaltet. Wenn ja, $this->maxSteps befüllen
        if (!empty($maxSteps) &&
            array_key_exists('x', $maxSteps) &&
            array_key_exists('y', $maxSteps)
        ) {
            $this->maxSteps = $maxSteps;
        }
    }

    public function shout() {
        /* 
            $this lässt uns auf Attribute und Methoden der eigenen
            Klasse zugreifen. Da das Objekt zum Zeitpunkt des Erstellens 
            der Klassenoch unbekannt ist, ist $this ein Platzhalter für
            das später erstellte Objekt.
            $this = ich, meine, ich - die Klasse
            mit $this wird auf ALLE eigenen Attribute und Methoden zugegriffen  
        */
        echo 'I am the hero ' . $this->name;
    }

    public function damage(int $damage) {
        $this->life -= $damage;

        echo $this->name . ' was damaged, life: ' . $this->life . '<br>';

        if($this->life <= 0) {
            $this->die();
        }
    }

    public function eat(string $food, int $health) {
        $this->life += $health;
        echo $this->name . ' has eaten ' . $food . ', life: ' . $this->life . '<br>';
    }

    protected function die() {
        echo  $this->name . ' died!';
    }

    public function move(int $x, int $y) {
        if (abs($x) > $this->maxSteps['x']) {
            if($x < 0) {
                $x = $this->maxSteps['x'] * -1;
            }
            else {
                $x = $this->maxSteps['x'];
            }
        }

        if (abs($y) > $this->maxSteps['y']) {
            if($y < 0) {
                $y = $this->maxSteps['y'] * -1;
            }
            else {
                $y = $this->maxSteps['y'];
            }
        }

        $this->position['x'] += $x;
        $this->position['y'] += $y;

        echo $this->name . 
            ' position x: ' . 
            $this->position['x'] . 
            ' position y: ' . 
            $this->position['y'] . 
            '<br>';
    }
}