<?php

$conn = new mysqli('localhost', 'root', '', 'wifi_todo');
    if ($conn->errno){
        die('Verbindungsfehler');
    }
    $sql = 'INSERT INTO todos (task, assignedTo, done) VALUES (?,?,?)';
    $stmt = $conn->prepare($sql);
    if(!$stmt){
        die('Prepare Fehler');
    }
    $task = 'ein neuer Task';
    $to = 'Thomas';
    $done = 0;
    $stmt->bind_param('ssi', $task, $to, $done);
    $stmt->execute();

    $task = 'ein 2 Task';
    $to = 'pepa';
    $done = 0;
    $stmt->bind_param('ssi', $task, $to, $done);
    $stmt->execute();

    echo 'Affected Rows: ' . $stmt->affected_rows;

?>