<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mysql Objekt orientiert</title>
</head>
<body>
    <pre>
    <?php
        $mysqli = new mysqli('localhost', 'root', '', 'classicmodels');
        
        if($mysli->connect_errno){
            die('Fehler DB Verbindung: '. $mysli->connect_error);
        }

        //var_dump($mysqli);
        $res = $mysqli->query('SELECT * FROM customers WHERE customerNumber < 140');



        while($row = $res->fetch_assoc()){
            var_export($row);
        }
    ?>
    </pre>
</body>
</html>