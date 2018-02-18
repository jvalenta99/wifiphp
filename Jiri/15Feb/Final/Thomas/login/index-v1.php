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
    $errors = 0;

    // Wurde ein Formular gepostet?
    // print_r($_POST);
    /* 
        $_POST ist ein Superglobal Array, das immer existiert.
        Wurden Felder gepostet, ist die Anzahl der Elemente in $_POST > 0
        count($arrayname) ermittelt die Anzahl der Elemente in einem Array
    */
    if ( count($_POST) > 0 ) {
        // Required fields (Pflichtfelder) prüfen. Wurde es nicht ausgefüllt, enthält es einen Leerstring
        if ($_POST['user'] == '') {
            echo 'Fehler User!';
            $errors++;
        }

        if ($_POST['password'] ==
         '') {
            echo 'Fehler password!';
            $errors++;
        }

       if ($errors == 0) { 
           if ($_POST['user'] != $u) {
                echo 'Falscher User!';
                $errors++;
            }

            if ($_POST['password'] != $p) {
                echo 'Falsches Passwort!';
                $errors++;
            }
        }
    }
    ?>
    <main>
        <h2>Anmelden</h2>
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
    </main>
</body>
</html>