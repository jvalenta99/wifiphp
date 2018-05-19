<?php
require_once 'lib/wifi-lib.php';
require_once 'lib/register-conf.php';

$errors = [];
$isSent = isSent();
$formValid = false;

if($isSent) {
    // Alle Felder aus der Konfiguration prüfen
    foreach($formConf as $fieldName => $conf) {
        if ($conf['required'] && !required($fieldName)) {
            $errors[$fieldName] = "Bitte füllen Sie das Feld {$conf['label']} aus";
        }        
        // Ist bisher kein Fehler für das aktuelle Feld aufgetreten?
        else {
            $value = $_POST[$fieldName] ?? '';

            if ($value === '') {
                // zum nächsten Schritt in foreach
                continue;
            }

            // Feld ist ausgefüllt, Datentyp überprüfen
            $dataType = $conf['dataType'];

            // Datentyp prüfen
            if ( validate_dataType($value, $dataType, $fieldName, $errors) ) {
                validate_misc($value, $fieldName, $conf, $errors);
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anmeldung</title>
    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
    <header class="site-header">
        <h1>Anmeldung</h1>
    </header>   

    <main>
        <h2>Registrieren Sie sich</h2>
        <?php
        // Wenn Fehler auftraten -> Fehlermeldungen ausgeben
        if (count($errors) > 0) {
            echo '<div class="form-errors">';
            foreach($errors as $key => $value) {
                $myConf = $formConf[$key];
                // Label aus formconf auslesen
                $myLabel = $myConf['label'];
                echo "<p>Fehler $myLabel: $value</p>";
            }
            echo '</div>';
        }
        ?>
        <form action="" class="pure-form pure-form-stacked" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Vor- und Nachname">

            <label for="email">E-Mail</label>
            <input type="email" name="email" id="email" placeholder="E-Mail">

            <label for="password">Passwort</label>
            <input type="password" name="password" id="password">

            <label for="password_confirm">Passwort bestätigen</label>
            <input type="password" name="password_confirm" id="password_confirm">

            <input type="submit" value="Senden" class="pure-button pure-button-primary">
        </form>
    </main>
</body>
</html>