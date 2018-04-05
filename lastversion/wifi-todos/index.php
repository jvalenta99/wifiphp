<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todos</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <link rel="stylesheet" href="css/todos.css">
</head>
<body>
<div class="container">
    <header class="site-header">
        <h1>TODOs</h1>
    </header>
    <main>
    <?php
    require 'init.php';
    $form = new \Formgen\Form($conf);

    if ($form->isSent()) {
        $validData = $form->isValid();
        
        if (!$validData) {
            echo $form->render();
        }
        else {
            // SQL Statement zusammensetzen
            $sql = 'INSERT INTO todos (task, assignedTo) VALUES ("' . 
                    $validData['task'] . 
                    '", "' . 
                    $validData['assignedto'] . 
                    '")';
                    //echo $sql;

            $res = $mysqli->query($sql);

            // Statement fehlerhaft?
            if($res === false) {
                echo  $mysqli->error . '<br>';
                echo $form->render();
            }
            else {
                echo 'OK';
            }
        }
    } 
    else {
        echo $form->render();

        // Tabelle ausgeben
    }
?>
    </main>
</div>

</body>
</html>