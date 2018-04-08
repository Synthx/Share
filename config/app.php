<?php

return [
    'name' => 'Share',
    'title' => 'Le site de covoiturage de Polytech Lille',
    'email' => 'contact@share.fr',
    'database' => [
        'host' => 'localhost',
        'port' => 3306,
        'user' => 'root',
        'pass' => '',
        'name' => 'share'
    ],
    'auth' => [
        'model' => 'Models\User',
        'login' => 'email',
        'password' => 'password'
    ],
    'crypt' => [
        'key1' => 'share',
        'key2' => 'polytech'
    ],
    'maps' => [
        'key' => 'AIzaSyCwwhVAuqjpZH6s8_Ab2Msrn0S7SBVE5vI'
    ],
    'social' => [
        'facebook' => 'https://www.facebook.com/',
        'twitter' => 'https://twitter.com/',
        'youtube' => '',
        'instagram' => 'https://www.instagram.com/',
        'gplus' => '',
    ]
];
