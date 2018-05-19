<?php 
    require_once 'init.php';     
    require_once 'login-conf.php';
    $form = new \Formgen\Form($conf);
    $content = '';

    if ($form->isSent()) {
        $validData = $form->isValid();
        if (!$validData) {
            $content = $form->render();
        }
        else {
            // Gültigen User ermitteln
            $isValidUser = validateUser($mysqli, $validData['username'], $validData['password']);

            if ($isValidUser) {
                // speichert, dass User eingelogged ist
                $_SESSION['username'] = $validData['username'];
                // Redirect
                header('Location: admin.php');
            }
            else {
                /* 
                    // Dieser Weg ist vorzuziehen bei einem Login
                    $content = '<p class="error">Benutzername oder Passwort falsch</p>';
                    $content .= $form->render();  
                */
                $form->setFieldError('username', 'Benutzername oder Passwort falsch');
                $form->setFieldValue('username', $validData['username']);
                $content = $form->render();
            }
        }
    } 
    else {
        $content = $form->render();
    }
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login System</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <style>
    body {
        padding: 2em;
    }
    .error {
        display: inline-block;
        background-color: #900;
        color: white;
        padding: 0.25em;
    }
    </style>
</head>
<body>
<h1>Login</h1>   
<?= $content ?>

</body>
</html>