<?php 
    require_once 'init.php'; 
    require_once 'register-conf.php';

    $form = new \Formgen\Form($conf);
    $content = '';

    if ($form->isSent()) {
        $validData = $form->isValid();
        if (!$validData) {
            $content = $form->render();
        }
        else {
            //insert into teilnehmer (id,vn) values(10,'Peter');
            $hashed = password_hash($validData['password'], PASSWORD_BCRYPT);
                    $sql = 'INSERT INTO users (username, password) values (?,?)';
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param('ss', $username, $hashed);
                
                if ($stmt->execute()) {
                    echo "user saved";         
                }
            }

            // User anlegen
            $hashed = password_hash($validData['password'], PASSWORD_BCRYPT);
            // var_dump(password_verify($validData['password'], $hashed));

            echo $hashed;
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