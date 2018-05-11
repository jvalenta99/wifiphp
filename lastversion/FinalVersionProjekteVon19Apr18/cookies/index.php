<?php
$br = '<br>';

/* setcookie('name', 'Thomas');
setcookie('lastrequest', date('d.m.Y H:i:s')); */

// Wird erst befüllt, wenn ein cookie vom Browser gesetzt wurde
echo $_COOKIE['name'] ?? 'name existiert nicht';
echo $br;
echo $_COOKIE['lastrequest'] ?? 'lastrequest existiert nicht';
