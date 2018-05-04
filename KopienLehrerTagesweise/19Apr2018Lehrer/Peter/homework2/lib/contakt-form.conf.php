<?php
/* 
    Die Namen der Formularfelder werden als key/index genommen
    Informationen zu den Feldern werden als Wert zugewiesen
*/
$formConf = [
    'contact_name' => [
        'required' => true,
        'dataType' => 'text',
        'label' => 'Name',
        'minlength' => 3
    ],

    'contact_pw1' => [
        'required' => true,
        'dataType' => 'password',
        'label' => 'Password_1',
    ],

    'contact_pw2' => [
        'required' => true,
        'dataType' => 'password',
        'label' => 'Password_2',
    ],

    'contact_email' => [
        'required' => true,
        'dataType' => 'email',
        'label' => 'E-Mail',
    ],
    
 ];

// print_r( $formConf['contact_email']['dataType'] );
