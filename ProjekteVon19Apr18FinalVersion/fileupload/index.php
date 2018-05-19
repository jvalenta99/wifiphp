<?php

$validTypes = [
    'image/jpeg',
    'image/gif',
    'image/png'
];

$maxSize = 25000;
$msg = '';

if (count($_FILES) > 0 && array_key_exists('thefile', $_FILES)) {

    $errors = $_FILES['thefile']['error'] !== 0;

    $isValidType = in_array($_FILES['thefile']['type'], $validTypes);

    // Kurzform um das Resultat einer Bedingung in einer Variable zu speichern
    $sizeOk = $_FILES['thefile']['size'] <= $maxSize;
    
    // Speicherpfad ermitteln
    $saveTo = './uploads/';
    $saveTo .= $_FILES['thefile']['name'];
    if (!$errors && $isValidType && $sizeOk) {
        move_uploaded_file($_FILES['thefile']['tmp_name'], $saveTo);
    }
    else {
        $msg = 'Es trat ein Fehler auf';
    }
}

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Upload</title>
    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>

<header class="site-header">
    <h1>Dateien hochladen</h1>
</header>

<main>
    <h2>Das Formular</h2>
    <?php echo "<p>$msg</p>"; ?>
    <!-- 
        ACHTUNG: beim file upload MUSS der enctype entsprechend gesetzt sein:
        enctype="multipart/form-data"
     -->
    <form action="" method="post" class="pure-form pure-form-stacked" enctype="multipart/form-data">
        <label for="theFile">Datei wählen</label>
        <input type="file" name="thefile" id="theFile">
        <input type="submit" value="Senden" class="pure-button pure-button-primary">
    </form>
</main>
<?php //print_r($_SERVER); ?>
</body>
</html>