<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Die If Anweisung</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
</head>
<body>
    <h1>Die If Anweisung</h1>
    <?php

    /* 
    If erlaubt es uns, das Programm zu verzweigen, bzw. bestimmte Teile unseres
    Programms nur auszuführen, wenn die abgefragte Bedingung true ergibt.
    (true/false = boolean)

    Beginnt mit dem Schlüsselwort "if", in den folgenden runden Klammern wird die
    Bedingung formuliert. Diese kann nur true oder false ergeben. Ergibt sie "true",
    dann wird der Block in den geschwungenen Klammern ausgeführt. Bei "false" wird
    dieser Block übersprungen.

    Vergleichsoperatoren:
    Es werden zwei Seiten miteinander verglichen. Links mit rechts vom Operator
    Gleichheit: ==,
    Ungleichheit: !=, <>
    Kleiner: <
    Kleiner ODER gleich: <=
    Größer: >
    Größer ODER gleich: >=

    */
    $zahl = 10;
    if ($zahl >= 10) {
        echo '<p>Jipie</p>';
    }

    // Stringvergleich: gleich oder ungleich können geprüft werden
    $name = 'Pepi';
    if ($name == 'Pepi') {
        echo '<p>Pepi!</p>';
    }

    // Else: Trifft die Bedingung nicht zu, kann ein anderer Programmteil ausgeführt werden.
    // wird ausgeführt, wenn die Bedingung true ergibt:
    if ($name == 'Pepino') {
        echo '<p>Pepi!</p>';
    }
    // wird ausgeführt, wenn die Bedingung false ergibt:
    else {
        echo '<p>Pepino!</p>';
    }

    // Alter prüfen
    $alter = 17;
    // Wenn das Alter mindestens 18 ist, geben Sie aus "Willkommen"
    // Wenn nicht, geben Sie aus "Sie dürfen leider nicht rein."
    if ($alter >= 18) {
        echo '<p>Willkommen</p>';
    }
    // wird ausgeführt, wenn die Bedingung false ergibt:
    else {
        echo '<p>Sie dürfen leider nicht rein.</p>';
    }
    ?>
</body>
</html>