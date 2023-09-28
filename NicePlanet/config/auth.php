<?php

return [

    'defaults' => [
    'guard' => 'web',
    'passwords' => 'users',
    ],


    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            'driver' => 'sanctum',
            'provider' => 'users',
            'hash' => true,
        ],
    ],



    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\Usuario::class,
        ],

    ],
];

