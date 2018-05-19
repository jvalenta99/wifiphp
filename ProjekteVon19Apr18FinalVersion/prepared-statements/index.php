<?php
/*
    Prepared statements werden in drei Schritten ausgeführt
    1. Das Statment wird ein mal der DB bekannt gegeben (prepare)
    2. vor jedem Ausführen werden die Parameter dem auszuführenden Statement
       bekannt gegeben (bind_param)
    3. Das statement wird ausgeführt (execute)
*/
$conn = new mysqli('localhost', 'root', '', 'wifi_todo');
if ($conn->errno) {
    die('Verbindungsfehler');
}


$sql = 'INSERT INTO todos (task, assignedTo, done) VALUES (?, ?, ?)';

// 1. Das Statment wird der DB bekannt gegeben
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die('Prepare Fehler');
}

$task = 'ein neuer Task';
$to = 'Thomas';
$done = 0;

// 2. Bei jedem mal ausführen werden die Parameter an Werte gebunden
// WICHTIG: die übergebenen Werte MÜSSEN in Variablen gespeichert sein, sie werden als Referenzen an die Funtkion übergeben
$stmt->bind_param('ssi', $task, $to, $done);
// 3. Das statement wird beliebig oft ausgeführt
$stmt->execute();
echo 'Affected Rows: ' . $stmt->affected_rows;


$task = 'noch ein neuer Task';
$to = 'Beppo';
$done = 0;

$stmt->bind_param('ssi', $task, $to, $done);
$stmt->execute();
echo 'Affected Rows: ' . $stmt->affected_rows;

$task = 'Lauter Tasks!';
$to = 'Pipi Langstrumpf';
$done = 0;

$stmt->bind_param('ssi', $task, $to, $done);
$stmt->execute();
echo 'Affected Rows: ' . $stmt->affected_rows;
?>