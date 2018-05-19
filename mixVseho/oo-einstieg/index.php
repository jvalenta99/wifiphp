<?php
require_once 'game/Hero.php';
/* 
    Konstanten werden einmal definiert. Ihr Wert kann nicht mehr geändert werden.
    Üblicher Weise werde sie in Großbuchstaben geschrieben. Kein $ Zeichen!
*/
define('BR', '<br>');

/*
    Objekt erstellen. Das erstellte Objekt ist eine Instanz der Klasse.
    Mit dem Schlüsselwort new gefolgt vom Klassennamen gefolgt von ()
    wird das neue Objekt erstellt. 
    Es können beliebig viele Instanzen des
    Objekts erstellt werden.
    Jede Klasse entspricht einem eigenen Datentyp!
*/
$myHero = new Hero('Zelda', 120, 40, ['x' => 2, 'y' => 2]);
$myHero->damage(43);
$myHero->damage(31);
$myHero->move(1,3);

$myHero->move(1, 3);
$myHero->eat('Hühnchen', 60);
$myHero->damage(72);

// Aufruf von Attributen und Methoden über den Objektzugriffsoperator ->
//echo $myHero->name . BR;

echo BR;
// Name ändern
$myHero->shout();
echo BR;
// Noch ein Hero
$sideKick = new Hero('Robin', 80, 25);
var_dump($sideKick);
echo BR;

$sideKick->shout();


