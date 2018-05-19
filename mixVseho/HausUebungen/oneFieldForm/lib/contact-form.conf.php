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
    'contact_email' => [
        'required' => true,
        'dataType' => 'email',
        'label' => 'E-Mail',
    ],
    'contact_message' => [
        'required' => true,
        'dataType' => 'text',
        'label' => 'Nachricht',
        'maxlength' => 700
    ],
    'contact_newsletter' => [
        'required' => false,
        'dataType' => 'whitelist',
        'label' => 'Newsletter abonnieren',
        'values' => [1]
    ],
 ];

// print_r( $formConf['contact_email']['dataType'] );
