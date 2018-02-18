<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Einstieg in PHP</title>
</head>
<body>
    <h1>Einstieg in PHP</h1>
    <p><?php
        // Einzeilige Kommentare
        /*
            Mehrzeilige
            Kommentare
        */

        /*
            Die unten stehende Zeile stellt eine Anweisung/Instruction dar.
            echo gibt den danach folgenden Ausdruck in der Seite aus (wie drucken).
            Jede Anweisung wird mit einem ; beendet.

            Leeräume/Whitespace (Tabs, Leerzeichen, Umbrüche) werden
            in PHP nicht ausgegeben, bzw. ignoriert - es gelten die selben Regeln wie in HTML.

            Best practice: jede Anweisung in einer eigenen Zeile
        */
        echo 100 * 3;
        
        echo '<strong>xx</strong>';
        
    ?></p>

    <h2>Variablen</h2>
    <?php
    /* Deklaration einer Variable: sie wird "geboren", ihre 
        Existenz wird bekannt gegeben.
        Initialsierung einer Variable: sie erhält zum ersten mal 
        einen zu speichernden Wert. z. B. Zahl, Text, boolean, Array ...
        Meistens werden beide zusammen in einer Anweisung erledigt.
    */
    $kontostand = 100;

    /* 
        Zuweisung: die Variable erhält einen Wert.
        Zuweisungen werden von rechts nach links ausgeführt.
        Links vom = steht die Variable, rechts steht ein Ausdruck, 
        der ausgewertet wird. Erst nach der Auswertung wird das Ergebnis des Ausdrucks in der Variable gespeichert =>
        der Variable zugewiesen.
    */
    $vorname = 'Thomas';
    $zinsen = $kontostand * 0.2;
    $kontostand = $kontostand + $zinsen;
    
    /*
        Bei Verwendung der Variable, wird der Name durch den in
        der Variable gespeicherten Wert ersetzt.
    */
    echo $kontostand;
    echo '<br>';
    echo $vorname;
    echo '<br>';
    /*  Eine Variable kann ihren Wert im Laufe eines Programms
        beliebig oft verändern
    */        
    $kontostand = 140;
    echo $kontostand;
        
    ?>
    
</body>
</html>