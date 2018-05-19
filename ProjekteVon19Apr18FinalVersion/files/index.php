<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Files</title>
    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" href="css/layout.css">
    <style>
    .m {
        background-color: #009944;
    }

    .w {
        background-color: #660099;

    }
    </style>
</head>
<body>
    <header class="site-header">
        <h1>Dateien in PHP</h1>
    </header>

    <main>
    <table class="pure-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Firma</th>
                <th>Foto</th>
            </tr>
        </thead>
        
    <?php
        // Funktion file: Inhalte in Array auslesen, jede Zeile ein Eintrag
        // $content = file('./members.csv');
        //print_r($content);
        $file = fopen('./members.csv', 'r');
        
        if ($file !== false) {
            // while: wie if, wird aber so oft ausgeführt, bis die 
            // Bedingung false ergibt
            while (!feof($file)) {
                // Zeile lesen, Zeiger in die nächste Zeile setzen
                // trim schneidet am Beginn/Ende alle Whitespaces ab
                $line = trim( fgets($file) );
                // Leerzeilen überspringen
                if ($line === '') {
                    continue;
                }

                // Zeile nach , ausplitten
                $entries = explode(',', $line);
               
                $cl = 'w';
                if ($entries[1] === 'M') {
                    $cl = 'm';
                }
                
                echo '<tr class="' . $cl . '">';
                echo '<td>' . $entries[2] . ' ' . $entries[3] . '</td>';
                echo '<td>' . $entries[4] .  '</td>';
                echo '<td>' . $entries[6] .  '</td>';
                echo '<td><img src="' . $entries[7] .  '" alt="Foto"></td>';                
                echo '</tr>';
            }
        }
        else {
            echo '<p>Datei konnte nicht geöffnet werden.</p>';
        }

    ?>
    </table>
    </main>
</body>
</html>