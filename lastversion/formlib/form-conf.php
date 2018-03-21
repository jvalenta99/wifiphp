<?php
$conf = [
    'vorname' => [
        'type' => 'text',
        'id' => 'feldVorname',
        'value' => 'blabla',
        'label' => 'Vorname',
        'tagAttributes' => [
            'class' => 'form-field',
            'title' => 'Ihr Vorname',
            'placeholder' => 'Vorname'
        ]
    ],
    'nachname' => [
        'type' => 'text',
        'id' => 'feldNachname',
        'value' => 'bliblbi',
        'label' => 'Nachname',
        'tagAttributes' => [
            'class' => 'form-field',
            'title' => 'Ihr Nachname',
            'placeholder' => 'Nachname'
        ]
    ]
    ,
    'email' => [
        'type' => 'email',
        'id' => 'feldEmail',
        'value' => '',
        'label' => 'E-Mail',
        'tagAttributes' => []
    ],
    'newsletter' => [
        'type' => 'checkbox',
        'id' => 'feldNewsletter',
        'value' => '1',
        'label' => 'Newsletter',
        'tagAttributes' => [
            'class' => 'form-field',
            'title' => 'Ihre Newsletter',
            'placeholder' => 'Newsletter'
        ]
    ]
];