<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mihail Web 1</title>
    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
    <header class="site-header">
        <h1>Mihail</h1> 
    </header>
    <?php
    // Daten aus DB
    $u = 'Pepi';
    $p = '654321';
    $errors = 2;
    $message = '';

    if ( count($_POST) > 0 ) {
        /*
            Mehrere Bedingungen können in einem if verknüpft werden.
            Mit && und || (UND bzw. ODER)
            Bei &&: Wenn eine der beiden NICHT erfüllt wird => false
            Bei ||: Wenn eine ODER die andere OK ist => true
        */
        if ( array_key_exists('user', $_POST) == true && 
             array_key_exists('password', $_POST) == true ) {
            if ( $_POST['user'] == $u &&
                 $_POST['password'] == $p) {
                $message = "Erfolg!";
                $errors = 0;
            }
        }
        
        if ($errors > 0) {
            $message = 'Bitte User und Passwort korrekt ausfüllen.';
        }
    }
    ?>
    <main>
        <?php
        $datatable = [
                'Apple Incorporated' => 'http://apple.com',
                'Adobe Systems Incorporated' => 'http://adobe.com',
                'Google LLC' => 'http://google.com'
            ];
        ?>
       
        <table class="pure-table pure-table-bordered"; align="center">
            <thead>
                <tr>
                    <th align="center">Company Name</th>
                    <th align="center">Link</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($datatable as $key => $value) {
                    echo '<tr>';
                    //echo '<li class="pure-menu-item">';
                    //echo '<a href="' . $value . '" class="pure-menu-link" target="_blank">';
                    echo '<td> ' . $key .  '</td>';
                    echo '<td> ' . '<a href="' . $value . '" class="pure-menu-link" target="_blank">' . substr($key, 0, strpos($key, ' ')) . '</td>';
                    //echo '</a>';
                    //echo '</li>';
                    //echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        
    </main>

    <footer class="footer">
        <p>&copy; Mihail Kaninski. All rights reserved!</p> 
    </footer>
</body>
</html>