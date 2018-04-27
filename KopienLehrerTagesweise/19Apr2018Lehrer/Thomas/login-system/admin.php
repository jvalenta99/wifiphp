<?php
    require_once 'init.php';
    // Nur für eingloggte user
    if(!isLoggedIn()) {
        header('Location: index.php');
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
    <h2>Admin</h2>
    <p>Willkommen auf der Admin Seite!</p>
</body>
</html>