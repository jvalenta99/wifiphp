<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Functions</title>
</head>
<body>
    <h1>Functions</h1>
    <?php
    /* 
        Eine Funktion wird über das Schlüsselwort "function" dekalriert. Der Name
        wird selbst vergeben (Regeln wie bei Variablen, nur ohne $). Es folgen 
        runde Klammern (Parameterliste) und in geschwungenen Klammern der 
        auzuführende Block (das eigentliche Unterprogramm).

        Eine Funktion wird vorerst deklariert, aber erst zum Zeitpunkt des Aufrufs 
        ausgeführt.
    */
    function firstFunction () {
        echo '<p>I bins, dei Funktion</p>';
    }

    // Aufruf der Funktion: Name plus Parameterliste (runde Klammern)
    // Funktionen können beliebig oft aufgerufen werden.
    firstFunction();
    firstFunction();
    firstFunction();

    /* 
        Rückgabewert: return beendet die Funktion und liefert an deren Stelle den angegebenen Wert.
        
    */
    function addieren1() {
        return  12 + 13;
    }

    /* 
        Beim Aufruf wird der return Wert an Stelle des Aufrufs gesetzt
        $summe = 25; 
    */
    $summe =  addieren1();
    echo 'Die Summe lautet: ' . $summe;

    /* 
        Eine Funktion kann nicht auf außerhalb liegende Variablen zugreifen. (Blackbox)
        Alle Werte, die von außen kommen, müssen über die Parameterliste (Arguments) 
        beim Aufruf mitgegeben werden.
        Variablen, die in einer Funktion deklariert werden, existieren nur zum Zeitpunkt des Aufrufs.
        Sie können nicht von außen eingesehen werden.

        Werden Parameter bei der Deklaration der Funktion angegeben, MÜSSEN diese in der angegebenen
        Reihenfolge beim Aufruf mitgegeben werden.

        Beim Aufruf muss die erwartete Anzahl an Parametern mitgegeben werden.
    */
    function addieren2 ($zahl1, $zahl2) {
        return $zahl1 + $zahl2;
    }

    echo '<br>';
    echo addieren2(23, 165);
    echo '<br>';
    echo addieren2(54, 1);
    echo '<br>';
    echo addieren2(77, 1623425);
    
    function subtrahieren($zahl1, $zahl2) {
        return $zahl1 - $zahl2;
    }
    
    function multiplizieren($zahl1, $zahl2) {
        return $zahl1 * $zahl2;
    }

    echo '<br>';
    echo subtrahieren(10, 212);
    echo '<br>';
    echo multiplizieren(3, 8);
    echo '<br>';

    function greaterThanFive($nr) {
        if ($nr > 5) {
            return true;
        }
        else {
            return false;
        }
    }

    var_dump(greaterThanFive(2));

    function isEven($nr) {
        if ($nr % 2 == 0) {
            return true;
        }
        // Kein else nötig, da return die Funktion beendet. Dh. wurde das vorige return aufgerufen,
        // werden keine folgenden Zeilen mehr ausgeführt.
        return false;
    }

    echo '<br>';
    var_dump(isEven(11));
    echo '<br>';
    var_dump(isEven(186));
    ?>
</body>
</html>