<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
    <header class="site-header">
        <h1>Login</h1> 
    </header>
    <?php
    // Daten aus DB
    $u = 'Pepi';
    $p = '654321';
    $errors = 2;
    $message = '';

    if ( count($_POST) > 0 ) {
        /*
            Mehrere Bedingungen können in einem if verknüpft werden.
            Mit && und || (UND bzw. ODER)
            Bei &&: Wenn eine der beiden NICHT erfüllt wird => false
            Bei ||: Wenn eine ODER die andere OK ist => true
        */
        if ( array_key_exists('user', $_POST) == true && 
             array_key_exists('password', $_POST) == true ) {
            if ( $_POST['user'] == $u &&
                 $_POST['password'] == $p) {
                $message = "Erfolg!";
                $errors = 0;
            }
        }
        
        if ($errors > 0) {
            $message = 'Bitte User und Passwort korrekt ausfüllen.';
        }
    }
    ?>
    <main>
        <h2>Anmelden</h2>
        <?php
        // Message ausgeben, wenn sie Text enthält
        if ($message != '') {
            echo "<p style=\"color: #900;\">$message</p>";
        }
        
        if ($errors > 0) { 
        ?>
        <!-- Emmet: form.pure-form.pure-form-stacked -->
        <form action="" method="post" class="pure-form pure-form-stacked">
            <label for="user">Benutzername</label>
            <!-- Emmet input:text -->
            <input type="text" name="user" id="user">

            <label for="passWord">Passwort</label>
            <!-- Emmet: input:password -->
            <input type="password" name="password" id="passWord">

            <!-- Emmet: input:submit -->
            <input type="submit" value="Senden" class="pure-button pure-button-primary">
        </form>
        <?php } // if $errors ENDE ?>
    </main>
</body>
</html>