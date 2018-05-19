<?php
require_once './lib/wifi-lib.php';
require_once './lib/contact-form.conf.php';

$errors = [];
$posted = isSent();

if ($posted) {
    // Formular wurde gesendet, Schleife über die Konfiguration
    // $fieldName = Name des zu validerenden Feldes, $value = 
    // wie ist das Feld zu validieren.
    foreach( $formConf as $fieldName => $value ) {
        // required prüfen
        if ( $value['required'] && !required($fieldName) ) {
            // Fehler: füge ein Feld mit unserem Feldnamen hinzu
           $errors[$fieldName] = "Bitte das Feld ausfüllen.";
        }
        // Feld kann ausgefüllt, oder nicht ausgefüllt sein
        else {
            // geposteten Wert ermitteln, wurde Feld nicht übermittelt -> auf Leerstring setzen Null coalescing operator
            $currentValue = $_POST[$fieldName] ?? '';

            // Wenn Leerwert gesendet, sind wir fertig, Feld ist valide
            if ($currentValue === '') {
                // beendet den aktuellen Schleifendurchlauf, das nächste
                // $formConf wird ausgelesen
                continue; 
            }
            // Feld wurde ausgefüllt!
            $dataType = $value['dataType'];

            // Alternative für if/elseif
            $validDataType = validate_dataType($currentValue, $dataType, $fieldName, $errors);

            // Sonstige Überprüfungen
            if ($validDataType) {
                if (array_key_exists('minlength', $value)) {
                    if (!validate_minlength($currentValue, $value['minlength'])) {
                        $errors[$fieldName] = "Geben Sie mindestens {$value['minlength']} Zeichen ein";
                        continue;
                    }
                }

                if (array_key_exists('maxlength', $value)) {
                    if (!validate_maxlength($currentValue, $value['maxlength'])) {
                        $errors[$fieldName] = "Geben Sie höchstens {$value['maxlength']} Zeichen ein";
                        continue;
                    }
                }
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
    <title>Kontakt</title>
    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
    <header class="site-header">
        <h1>Kontakt</h1>
    </header>
    <main>
        <h2>Kontaktieren Sie uns</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic incidunt nihil delectus exercitationem recusandae amet dolorum, aperiam facere ducimus adipisci eveniet est molestiae nulla rerum magnam quia debitis, eaque natus?</p>
        <pre>
            <?php print_r($_POST); ?>
        </pre>
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

        <form action="" method="post" class="pure-form pure-form-stacked">
            <label for="contactName">Name <sup>*</sup></label>
            <input type="text" name="contact_name" id="contactName" placeholder="Name" value="<?php echo $_POST['contact_name'] ?? ''; ?>">

            <label for="contactEmail">E-Mail <sup>*</sup></label>
            <input type="email" name="contact_email" id="contactEmail" placeholder="name@adresse.com" value="<?php echo $_POST['contact_email'] ?? ''; ?>">

            <label for="contactMessage">Nachricht <sup>*</sup></label>
            <textarea name="contact_message" id="contactMessage"><?php echo $_POST['contact_message'] ?? ''; ?></textarea>

            <label for="contactNewsletter">
                <input type="checkbox" name="contact_newsletter" id="contactNewsletter" value="1">
                Newsletter abonnieren
            </label>

            <input type="submit" value="Senden" class="pure-button pure-button-primary">
        </form>
    </main>
</body>
</html>