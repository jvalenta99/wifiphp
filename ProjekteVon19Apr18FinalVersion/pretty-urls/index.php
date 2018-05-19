<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pretty Urls</title>
</head>
<body>
    <h1>Pretty Urls</h1>
    <?php
    $validPages = [
        'home' => 'home.php',
        'shop' => 'shop.php',
        'impressum' => 'impressum.php',
        'blog' => 'blog.php'
    ];

    // Url auslesen
    $uri = $_SERVER['REQUEST_URI'];

    
    // Url bereinigen, da wir keinen Virtual Host angelegt haben, optional
    $uri = str_replace('/pretty-urls/', '', $uri);

    // Splitte uri auf, der erste Eintrag ist die abzufragende Seite
    $page = explode('/', $uri)[0];
    
    // default Page
    if ($page === '') {
        $page = 'home';
    }
    
    // Prüfen, ob eine gültige Seite abgefragt wurde
    if(array_key_exists($page, $validPages)) {
        include 'inc/' . $validPages[$page];
    }
    else {
        // 404 - Seite nicht gefunden Fehler
        echo '<p>Fehler 404: Seite nicht gefunden</p>';
    }
    
    ?>


    <pre>    
    <?php //print_r($_SERVER); ?>
    </pre>
</body>
</html>