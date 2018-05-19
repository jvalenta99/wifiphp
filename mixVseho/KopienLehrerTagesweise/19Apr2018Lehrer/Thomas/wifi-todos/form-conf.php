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
        'task' => [
            'type' => 'text',
            'label' => 'Aufgabe',
            'id' => 'task',
            'value' => '',
            'validationRules' =>'required|max_len,255',
            'filterRules' => 'trim|sanitize_string'
        ],
        'assignedto' => [
            'type' => 'text',
            'label' => 'Zuständig',
            'id' => 'assignedTo',
            'value' => '',
            'validationRules' =>'required|max_len,255',
            'filterRules' => 'trim|sanitize_string'
        ],
        'senden' => [
            'type' => 'submit',
            'id' => 'submit',
            'value' => 'Senden',
            'label' => '',
            'tagAttributes' => [
                'class' => 'pure-button pure-button-primary'
            ]
        ]
    ]
];