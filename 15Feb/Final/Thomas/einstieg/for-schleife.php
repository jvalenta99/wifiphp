<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Die For Schleife</title>
</head>
<body>
    <h1>Die For Schleife, oder Zähl Schleife</h1>
    <h2>Die Zweier Reihe</h2>
    <ul>
    <?php
    // Zweier Reihe vorbereiten
    $reihe = 2;
    for($i = 1; $i <= 10; $i = $i + 1){
        $produkt = $i * $reihe;

        // Ausgabebeispiel: 2 x 2 = 4
        echo "<li>$i x $reihe = $produkt</li>";
    }
    ?>
    </ul>

    <h2>Die Dreier Reihe</h2>
    <ul>
    <?php
    // Dreier Reihe vorbereiten
    $reihe = 3;
    for($i = 1; $i <= 10; $i++){
        $produkt = $i * $reihe;

        // Ausgabebeispiel: 2 x 2 = 4
        echo "<li>$i x $reihe = $produkt</li>";
    }
    ?>
    </ul>

    <?php
    // Operatoren für eins hoch/runter zählen
    $i = $i + 1;
    $i += 1;
    $i++;

    $j = 1;
    $j = $j - 1;
    $j -= 1;
    $j--;
    ?>
</body>
</html>