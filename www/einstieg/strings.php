<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Strings</title>
</head>
<body>
    <h1>Strings - Zeichenketten</h1>
    <?php
        // Wir nehmen an, die Variablen werden aus der DB befüllt.
        $firstName = 'Thomas';
        $familyName = 'Macher';

        /* 
            Strings können miteinander verknüpft werden. Dies geschieht
            durch den . Operator.

            Alternative hier: $fullName = "$firstName $lastName";
        */
        $fullName = $firstName . ' ' . $familyName;
        echo $fullName;
        
        $br = '<br>';
        echo $br;

        /* 
            Einfache Anführungszeichen bei Strings geben diese unverändert aus.
        */
        echo 'Mein Name ist $fullName';
        echo $br;
        
        /* 
        Doppelte Anführungszeichen werden interpretiert und können
        Variablen beinhalten!

        Alternative: echo 'Mein Name ist ' . $fullName;
        */
        echo "Mein Name ist $fullName";
        echo $br;
        // Beispiel für Stringfunktion:  Teile ersetzen
        $fullName = str_replace('Macher', 'Müller', $fullName);
        echo $fullName;
        echo $br;

        // Geben Sie den Text: Willkommen, Herr Macher mit Hilfe unserer Variablen aus.
        echo 'Willkommen, Herr ' . $familyName;
        echo $br;
        echo "Willkommen, Herr $familyName";
    ?>
    
</body>
</html>