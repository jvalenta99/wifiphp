<?php
// hostname, username, passwort, dbname
$db = mysqli_connect('localhost','root','','wifitag5');
if( mysqli_connect_error() ){
    die('Datenbank Verbindung fehlgeschlagen'. mysqli_connect_error());
    // für produktiv
    die('Datenbank Verbindung fehlgeschlagen');
}
