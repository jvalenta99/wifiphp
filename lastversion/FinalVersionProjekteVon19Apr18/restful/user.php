<?php
$method = strtoupper($_SERVER['REQUEST_METHOD']);

switch ($method) {
    case 'GET':
        echo 'Yeah, GET! ' . $_REQUEST['id'];
    break;
    case 'POST':
        echo 'Yeah, POST!' . $_REQUEST['id'];
    break;
    case 'PUT':
        $data = 'id';
        echo 'Yeah, PUT!';
    break;
    case 'DELETE':
        echo 'Yeah, DELETE!';
    break;
    case 'PATCH':
        echo 'Yeah, PATCH!';
    break;
}

/* echo '<pre>';
print_r($_REQUEST);
echo '</pre>'; */
