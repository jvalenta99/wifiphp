<?php
require_once 'lib/wifi-lib.php';
require_once 'lib/register-conf.php';

$errors = [];
$isSent = isSent();
$formValid = false;
$errorValues = [];
$written = false;

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


    } // Ende foreach

    /* 
        Weitere, nicht durch die Konfiguration abgedeckte Überprüfungen
        werden nach der allgemeinen Überprüfung gemacht. 
    */
    // Keines der beiden Felder ist fehlerhaft
    if (!array_key_exists('password', $errors) && 
        !array_key_exists('password_confirm', $errors)) {
        // Fehler, wenn die Felder unterschiedlich sind
        if ($_POST['password'] !== $_POST['password_confirm']) {
            $errors['password_confirm'] = 'Passwort und Passwort bestätigen müssen gleich sein';
        }
        else {
            $formValid = true;
        }
    }


}

// Formular mit korrekten Daten in Datei schreiben
if ($formValid) {
    // schreibe in die Datei
    $file = fopen('./registered.csv', 'a');
    $content = $_POST['name'] . 
                ',' .
                $_POST['email'] .
                ',' .
                $_POST['password'] .
                "\n"; // doppelte Anführungszeichen, da sonst kein Newline erzeugt wird
    // Zeile schreiben
    $written = fwrite($file, $content);
    // Datei schließen
    fclose($file);
}
/* 
    TODO: optimieren, besser schreiben
    Wurde das Formular gesendet und es enthält Fehler, möchten wir die gesendeten
    Wert wieder in die Formularfelder eintragen.
*/
elseif (!$formValid && $isSent) {
    foreach($formConf as $key => $value) {
        $errorValues[$key] = '';
        
        // Errorvalues nur eintragen, wenn showValue nicht gesetzt oder true ist
        if (!array_key_exists('showValue', $value) || $value['showValue'] === true) {
            $errorValues[$key] = trim($_POST[$key]);
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
        elseif ($written) {
            echo'<p>Daten wurden erfolgreich eingetragen!</p>';
        }
        ?>
        <form action="" class="pure-form pure-form-stacked" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Vor- und Nachname" value="<?= $errorValues['name'] ?? ''; ?>">

            <label for="email">E-Mail</label>
            <input type="email" name="email" id="email" placeholder="E-Mail"  value="<?= $errorValues['email'] ?? '' ?>">

            <label for="password">Passwort</label>
            <input type="password" name="password" id="password">

            <label for="password_confirm">Passwort bestätigen</label>
            <input type="password" name="password_confirm" id="password_confirm">

            <input type="submit" value="Senden" class="pure-button pure-button-primary">
        </form>
    </main>
</body>
</html>