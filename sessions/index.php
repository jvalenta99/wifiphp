<?php
session_start();
session_regenerate_id();

$_SESSION['name'] = 'Thomas';
$_SESSION['time'] = date('d.m.Y H:i:s');
echo $_SESSION['name'];

?>
<a href="session-test.php">session testen</a>