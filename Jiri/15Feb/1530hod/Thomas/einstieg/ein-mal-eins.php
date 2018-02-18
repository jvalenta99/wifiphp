<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ein mal eins</title>
</head>
<body>
    <h1>Das kleine 1 x 1</h1>
    <p><a href="?reihe=2">Zweier Reihe</a></p>
    <p><a href="?reihe=3">Dreier Reihe</a></p>
    <p><a href="?reihe=4">Vierer Reihe</a></p>
    <p><a href="?reihe=5">Fünfer Reihe</a></p>
    <ul>
    <?php
    // Reihe vorbereiten
    /* 
        $_GET ist eine Superglobal, dh. sie steht immer und überall zur Verfügung.
        Wurde ein gültiger Query String mitgegeben, werden die Teile im 
        Array $_GET mit dem Namen der Variable als Index gespeichert
    */
    $reihe = $_GET['reihe'];
    
    for($i = 1; $i <= 10; $i = $i + 1){
        $produkt = $i * $reihe;
        echo "<li>$i x $reihe = $produkt</li>";
    }
    ?>
    </ul>
</body>
</html>