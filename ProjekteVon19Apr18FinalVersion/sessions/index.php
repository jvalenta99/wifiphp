<?php
/* 
    Sessions erlauben es, ein Gedächtnis zwischen Requests am Server
    zu erzeugen. Die Superglobal $_SESSION ist ein assoziatives Array, das
    von uns beliebig befüllt werden kann.

    session_start() ermöglicht den Zugriff auf Sessions. Achtung, nicht
    vergessen!

*/
session_start();
session_regenerate_id(); // erzeugt für jeden request eine neue id

$_SESSION['name'] = 'Thomas';
$_SESSION['time'] = date('d.m.Y H:i:s');
?>
<a href="session-test.php">Session testen</a>
