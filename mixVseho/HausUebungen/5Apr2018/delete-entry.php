<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eintrag löschen</title>
</head>
<body>
    <?php
    $res = [1, 2, 3, 4, 5];

    if (!empty($_GET) && isset($_GET['delid'])) {
        $delid = $_GET['delid'];
        // TODO: $delid validieren -> int!
        $sql = 'DELETE FROM todos WHERE id=' .  $delid;
        echo $sql;
    }

    ?>
<p>
    <?php foreach ($res as $id): ?>
    <a href="./delete-entry.php?delid=<?= $id ?>">Löschen Eintrag <?= $id ?></a><br>
    <?php endforeach; ?>
</p>  
</body>
</html>