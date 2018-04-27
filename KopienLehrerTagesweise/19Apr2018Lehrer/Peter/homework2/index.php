<?php
require_once './lib/wifi-lib.php';
require_once './lib/contakt-form.conf.php';

$errors = [];       // Array für die Fehlerausgabe
$posted = isSent();

if ($posted) {        
    foreach( $formConf as $fieldName => $value ) {
        // required prüfen
        if ( $value['required'] && !required($fieldName) ) {
           $errors[$fieldName] = "Bitte das Feld ausfüllen.";            
        }
        else {
            
            if (@$currentValue == @$_POST[$fieldName] ) {
                @$currentValue = @$_POST[$fieldName];
            }
            else {
                $currentValue = '';
            }
        // Null Coalescing Operator (??), wenn fieldName nicht mitgeschickt wurde (bei nicht geklickter Checkbox) wird Variable stattdessen mit '' befüllt
        // Wenn Leerwert gesendet, sind wir fertig, Feld ist valide

        //if ($currentValue === '') {
            // continue beendet den aktuellen Schleifen-Durchlauf, das nächste $formConf wird ausgelesen
        //    continue;
        //}
        // Feld ist nicht required aber ausgefüllt:
        

        // Passwort-Überprüfung, PW1 und PW2 gleich
        /*if ($_POST['contact_pw1'] !== $_POST['contact_pw2']) {
            $errors['PW_ungleich'] = "Passwort-Eingaben ungleich";
        } */

        if (validate_pw_gleich($_POST['contact_pw1'],$_POST['contact_pw2'])) {
            $errors['PW_ungleich'] = "Bitte 2x das selbe Passort eingeben!";
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
        <h2>Geben Sie Ihre Daten ein</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic incidunt nihil delectus exercitationem recusandae amet dolorum, aperiam facere ducimus adipisci eveniet est molestiae nulla rerum magnam quia debitis, eaque natus?</p>
        <?php
            // Wenn Fehler auftreten -> Meldung ausführen
            if (count($errors) > 0) {
                echo '<div class="form-errors">';
                foreach($errors as $key => $value) {
                    // Label aus formconf auslesen
                    @$myLabel = $formConf[$key]['label'];
                    echo "<p>Fehler $myLabel: $value</p>";
                }
                echo '</div>';
            }
            else {
                echo '<b>Super, erfolgreich angemeldet!</b><br>';
            }
                      

        ?>

        <form action="" method="post" class="pure-form pure-form-stacked">

            <label for="contactName">Username <sup>*</sup></label>
            <input type="text" name="contact_name" id="contactName" placeholder="Name" value="<?php
                if (@$_POST['contact_name']) {
                    echo $_POST['contact_name'];
                    }
                else {
                    '';
                    } ?>">
            
            <label for="contactPw1">Password <sup>*</sup></label>
            <input type="password" name="contact_pw1" id="contactPw1" placeholder="Password">

            <label for="contactPw2">Password wiederholen<sup>*</sup></label>
            <input type="password" name="contact_pw2" id="contactPw2" placeholder="Password">
                 

            <label for="contactEmail">E-Mail <sup>*</sup></label>
            <input type="email" name="contact_email" id="contactEmail" placeholder="name@adresse.com" value="<?php
             if (@$_POST['contact_email']) {
                echo $_POST['contact_email'];
                }
            else {
                '';
                 } ?>">
            

            
            <input type="submit" value="Senden" class="pure-button pure-button-primary">
        </form>
    </main>
</body>
</html>
