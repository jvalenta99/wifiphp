<?php
$formConf = [
    'name' => [
        'required' => true,
        'dataType' => 'text',
        'label' => 'Name',
        'minlength' => 3
    ],
    'email' => [
        'required' => true,
        'dataType' => 'email',
        'label' => 'E-Mail',
    ],
    'password' => [
        'required' => true,
        'dataType' => 'text',
        'label' => 'Passwort'
    ],
    'password_confirm' => [
        'required' => true,
        'dataType' => 'text',
        'label' => 'Passwort bestätigen'
    ],
 ];

