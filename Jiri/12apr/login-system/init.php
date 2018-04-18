<?php
session_start();
define ('PROJECT_ROOT', __DIR__ . '/');
define ('PW_SALT', 'AsdjJK987JLOP_ioadfPOUBzu');

function form_loader($className) {
    // Unix/Linux
    $fileName = PROJECT_ROOT . '/' .  str_replace('\\', '/', $className) . ".php";
    
    if(file_exists($fileName)) {
        require($fileName);
    }
}

spl_autoload_register('form_loader');
require_once 'inc/funcs.php';

$mysqli = new mysqli('localhost', 'root', '', 'wifi_todo');
if (!$mysqli) {
    die ('Database Connection Error');
}

/* require_once 'lib/base.php';
$f3 = Base::instance(); */