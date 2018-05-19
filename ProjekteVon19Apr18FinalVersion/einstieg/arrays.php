<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arrays</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
</head>
<body>
    <h1>Arrays</h1>
    <?php
    /*
        Arrays erlauben uns, unter einem Variablen Namen mehrere Werte zu speichern.
        Array sind ein eigener Datentyp.

        Leere Arrays erstellen: 
        mit der Array Funktion
        über eckige Klammern
    */
    $arr1 = array();
    $arr2 = [];

    /* 
        Üblicher Weise werden Arrays bei der Deklaration gleich mit Werten initialisiert
        Bei der Array Funktion können diese Werte in runden Klammern durch Beistrich getrennt mitgegeben werden
        Ähnlich bei der Methode mit eckigen Klammern

        Die Werte können beliebige Datentypen sein.
    */
    $pflanzen = array('Blume', 'Karotte', 'Gras');
    $zahlen = [120, 33, 14];

    /* 
        Verwendung: Jeder Eintrag ist über einen Index erreichbar. Der erste Eintrag in einem Array hat den Index 0. Der Index wird in eckigen Klammern nach dem 
        Variablennamen angegeben. Der Index wird beim Erstellen automatisch vergeben und 
        hochgezählt.
    */
    echo $zahlen[2];

    // Variablen zu Testzwecken ausgeben: var_dump($variable) oder print_r($variable)
    // print_r($pflanzen);

    $br = '<br>';
    echo $br;

    /* 
        Weitere Werte an ein Array anfügen: Der Variable plus leere eckige Klammern
        einen Wert zuweisen
    */
    $pflanzen[] = 'Kohl';
    $pflanzen[] = 'Banane';
    print_r($pflanzen);
    echo $br;

    /* 
        Bad practice: selbst den Index beim hinzufügen bestimmen
    */
    $bad = ['Tom', 'Jerry', 22, false];
    $bad[4] = 'Jipie';
    // BÖSE!!! Nie selbst einen Zahlenindex beim hinzufügen angeben
    $bad[122] = 'Uijeh'; 
    $bad[] = 'Na holla';
    print_r($bad);
    echo $br;

    // Werte überschreiben: den Index des zu überschreibenden Wertes angeben
    $pflanzen[0] = 'Kamille';
    print_r($pflanzen);

    /* 
        Assoziative Arrays
        Der Index ist ein String. Dieser muss also von uns explizit angegeben werden.
        Er wird nicht automatisch erstellt.
    */
    $kunde = [];
    $kunde['vorname'] = 'Gabi';
    $kunde['nachname'] = 'Mayer';
    $kunde['adresse'] = 'Zu Hause 12';
    $kunde['ort'] = 'Entenhausen';
    echo $br;
    print_r($kunde);
    echo $br;
    echo $kunde['adresse'];

    /* 
        Bad practice, VORSICHT!
        Unbedingt vermeiden. Assoziative und automatisch erstellte Indizes dürfen NIE
        gemischt werden.
    */
    $kunde[] = 100;
    echo $br;
    print_r($kunde);

    /* 
       Foreach Schleife - eine Schleife über alle Elemente des Arrays 
       Variante 1: nur den Wert bei jedem Durchlauf auslesen.
       In den runden Klammern wird an erste Stelle das Array angegeben.
       Ist mindestens ein Eintrag vorhanden, wird der erste Eintrag in der Variable,
       hier $value, gespeichert. Der Block (geschwungene Klammern) wird ausgeführt (wie
       bei der for Schleife). 
       Ist der Block abgearbeitet, wird nachgesehen ob noch ein Eintrag vorhanden ist.
       Wenn ja, wird dieser Eintrag in $value gespeichert, der Block wieder ausgeführt.
       Dies geschieht so lange, wie es Einträge gibt.
    */
    foreach ($pflanzen as $value) {
        echo "<p>$value</p>";
    }

    /*
        Assoziatives Array mit Werten initialisieren
        Die Einträge werden durch Beistrich getrennt angegeben.
        Jeder Eintrag beginnt mit eine String mit dem Index,
        der Wert wird über den Array Zuweisungsoperator => diesem Index zugewiesen
    */
    $nachrichten = [
        'Der Standard' => 'http://derstandard.at',
        'Kurier' => 'http://kurier.at',
        'Presse' => 'http://diepresse.com',
        'Heute' => 'http://heute.at',
        'Österreich' => 'http://oe24.at',
        'Spatzenpost' => 'http://spatzenpost.at'
    ];

    /* 
        Variante 2: auch der Index (Key) kann ausgelesen werden.
        Die Variablen $key oder $value dürfen beliebig benannt werden.
        In der Variable $key wird bei jedem Schleifendurchlauf der Index gespeichert,
        in $value der zugehörige Wert.
    */
    foreach ($nachrichten as $key => $value) {
        echo "<p>$key, $value</p>";
    }
    ?>
    
    <h2>Eine Navigation</h2>
   <!-- Emmet: nav.pure-menu.pure-menu-horizontal -->
    <nav class="pure-menu pure-menu-horizontal">
        <!-- Emmet: ul.pure-menu-list -->
        <ul class="pure-menu-list">
            <?php
            foreach ($nachrichten as $key => $value) {
                echo '<li class="pure-menu-item">';
                echo '<a href="' . $value . '" class="pure-menu-link" target="_blank">';
                echo $key;
                echo '</a>';
                echo '</li>';
            }
            ?>
        </ul>
    </nav>
</body>
</html>