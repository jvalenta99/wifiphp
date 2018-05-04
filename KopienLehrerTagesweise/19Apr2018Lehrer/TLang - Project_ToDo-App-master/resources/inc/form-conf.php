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
            'class' => 'login_form'
        ]
    ],
    'fields' => [
        'user' => [
            'type' => 'text',
            'label' => 'User',
            'id' => 'user',
            'value' => '',
            'tagAttributes' => [
                'class' => '',
                'title' => 'Ihr Vorname',
                'placeholder' => 'Benutzername'
            ],
            'validationRules' =>'required|alpha_numeric|max_len,30|min_len,4',
            'filterRules' => 'trim|sanitize_string'
        ],
        'passwort' => [
            'type' => 'password',
            'id' => 'password',
            'value' => '',
            'label' => 'Passwort',
            'tagAttributes' => [],
            'validationRules' =>'required|alpha_numeric|max_len,100|min_len,6',
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
        ],
    ]
];