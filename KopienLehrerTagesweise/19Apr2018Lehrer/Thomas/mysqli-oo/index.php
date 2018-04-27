<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mysql Objektorientiert</title>
</head>
<body>
<pre>
<?php
    // Verbindung aufbauen, mysqli Objekt erzeugen
    $mysqli = new mysqli('localhost', 'root', '', 'classicmodels');

    // Prüfen, ob die Verbindung erfolgreich war
    if($mysqli->connect_errno) {
        die('Fehler DB Verbindung: ' . $mysqli->connect_error);
    }
    $customerNumber = 130;
    // Eine Query liefert ein result Objekt
    $res = $mysqli->query('SELECT * FROM customers WHERE customerNumber < ' . $customerNumber);
    
    // Zeilenweise die Resultate auslesen
    while ($row = $res->fetch_assoc()) {
        var_export($row);
    }

?>
</pre>
</body>
</html>