<?php

return [

    /*
    |----------------------------------------------------------------------
    | Authentication Defaults
    |----------------------------------------------------------------------
    */
    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |----------------------------------------------------------------------
    | Authentication Guards
    |----------------------------------------------------------------------
    */
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'dokter' => [
            'driver' => 'session',
            'provider' => 'dokters', // Pastikan provider 'dokters' untuk guard 'dokter'
        ],
        'pasien' => [
            'driver' => 'session',
            'provider' => 'pasiens', // Pastikan provider 'pasiens' untuk guard 'pasien'
        ],
    ],

    /*
    |----------------------------------------------------------------------
    | User Providers
    |----------------------------------------------------------------------
    */
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class, // Pastikan model yang tepat untuk 'users'
        ],
        'dokters' => [
            'driver' => 'eloquent',
            'model' => App\Models\Dokter::class, // Pastikan model Dokter untuk 'dokters'
        ],
        'pasiens' => [
            'driver' => 'eloquent',
            'model' => App\Models\Pasien::class, // Pastikan model Pasien untuk 'pasiens'
        ],
    ],

    /*
    |----------------------------------------------------------------------
    | Passwords Configuration
    |----------------------------------------------------------------------
    */
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |----------------------------------------------------------------------
    | Password Confirmation Timeout
    |----------------------------------------------------------------------
    */
    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),
];
