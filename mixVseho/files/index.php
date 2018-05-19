<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dateien in PHP</title>

</head>

<style>
    .m {
        background-color: #009944;
    }

    .w {
        background-color: #660099;
    }

</style>
<body>
    <h1>Dateine in PHP</h1>
    <?php
        //Funktion file: inhalte in Array auslesen
        //$content = file('./members.csv');
        //print_r($content);

        $file = fopen('./members.csv','r');
        if ($file !== false) {

            while ( !feof($file)){
               echo  '<p>'.fgets($file). '<p>';
            }


        }
        else {
            echo '<p>Datei konnte nicht geöffnet werde.</p>';
        }
    ?>
</body>
</html>

$line = fgets($file);
$entries = explode(',', $line)