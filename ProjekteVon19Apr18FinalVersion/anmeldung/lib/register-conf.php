<?php
$formConf = [
    'name' => [
        'required' => true,
        'dataType' => 'text',
        'fieldType' => 'text',
        'tagAttributes' => ['class' => 'wichtig', 'title' => 'wichtiges Feld'],
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
        'label' => 'Passwort',
        'showValue' => false
    ],
    'password_confirm' => [
        'required' => true,
        'dataType' => 'text',
        'label' => 'Passwort bestätigen',
        'valueEqualTo' => 'password',
        'showValue' => false
    ],
 ];

