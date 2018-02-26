<?php
// Variablen initialisieren, alle Variablen werden zu Beginn deklariert.
$msg = '';

// Formular prüfen
// wurde gepostet?
if ( count($_POST) > 0 ) {
    // Wurden die erwarteten Felder gesendet? Prüfen, ob Index vorhanden ist
    // && => AND beide Bedingungen müssen true ergeben
    // || => OR eine der beiden Bedingungen muss true ergeben
    // damit die gesamte Bedingung true ergibt
    if ( array_key_exists('zahl1', $_POST) == false || 
         array_key_exists('zahl2', $_POST) == false ) {
        $msg = '<p>Formular ungültig.</p>';
    }
    else {
        // required (Pflichtfelder) prüfen
        // ALLES aus GET/POST ist ein String
        if ($_POST['zahl1'] == '' || $_POST['zahl2'] == '') {
            $msg = '<p>Zahl 1 und Zahl 2 müssen ausgefüllt werden.</p>';
        }
        else {
            // TODO: Datentyp auf Zahl überprüfen

            $summe = $_POST['zahl1'] + $_POST['zahl2'];
            // Das Ergebnis als String zusammen setzen
            $msg = '<p>Die Summe aus ' . 
                    $_POST['zahl1'] .
                    ' + ' .
                    $_POST['zahl2'] .
                    ' = ' .
                    $summe .
                    '</p>';
        }
    }
}

?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rechner</title>
    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
   <header class="site-header">
        <h1>Rechner</h1>
   </header>

   <main>
        <h2>Addieren</h2>
        <?php echo $msg; ?>
        <form action="" method="post" class="pure-form pure-form-stacked">
            <label for="zahl1">Zahl 1</label>
            <input type="number" name="zahl1" id="zahl1">

            <label for="zahl2">Zahl 2</label>
            <input type="number" name="zahl2" id="zahl2">

            <input type="submit" value="Addieren" class="pure-button pure-button-primary">

            
        </form>
   </main>
</body>
</html>