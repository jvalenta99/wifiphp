<?php
/* 
    Array mit Konfigurationen für:
    - Formular
    - Formularfelder
*/
$conf = [
    'form' => [
        'action' => '',
        'method' => 'post',
        'id' => 'contactForm',
        'errorClass' => 'error',
        'tagAttributes' => [
            'class' => 'pure-form pure-form-stacked'
        ]
    ],
    'fields' => [
        'username' => [
            'type' => 'text',
            'label' => 'Benutzername',
            'id' => 'userName',
            'validationRules' =>'required|min_len,6|max_len,50',
            'filterRules' => 'trim|sanitize_string'
        ],
        'password' => [
            'type' => 'password',
            'label' => 'Passwort',
            'id' => 'password',
            
            'validationRules' =>'required|max_len,100|min_len,6',
            'filterRules' => 'trim|sanitize_string'
        ],
        'senden' => [
            'type' => 'submit',
            'id' => 'feldSubmit',
            'value' => 'Senden',
            'label' => '',
            'tagAttributes' => [
                'class' => 'pure-button pure-button-primary'
            ]
        ]
    ]
];