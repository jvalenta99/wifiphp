<?php
$br = '<br>';
/* setcookie('name','Thomas');
setcookie('lasterquest',date('d.m.Y h:i:s')); */

echo $_COOKIE['name'] ?? 'name existiert nicht';
echo $br;
echo $_COOKIE['lasterquest'] ?? 'lastrequest existiert nicht';
