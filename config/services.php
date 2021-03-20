<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
         'client_id' => '2091838484373383',         // Your facebook Client ID
        'client_secret' => 'bc6b19e476123f0f6bc55549b6e36d36', // Your facebook Client Secret
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],

    'twitter' => [
        'client_id' => '53pUtKIUMVI7ULt0vNXql6nJp',         // Your twitter Client ID
        'client_secret' => 'dJ3wMvUUOkW4bPB1fw12NkGFcg6509W1big2oaLIRPW0cYM8RB', // Your twitter Client Secret
        'redirect' => 'http://localhost:8000/login/twitter/callback',
    ],
    'github' => [
        'client_id' => 'Iv1.115d9992f9851787',         // Your github Client ID
        'client_secret' => 'dba550552966f40197a25329e651a0774b9d8e7f', // Your github Client Secret
        'redirect' => 'http://127.0.0.1:8000/login/github/callback',
    ],
    'linkedin' => [
        'client_id' => '',         // Your linkedin Client ID
        'client_secret' => '', // Your linkedin Client Secret
        'redirect' => 'http://localhost:8000/login/linkedin/callback',
    ],
    'google' => [
        'client_id' => '327076794819-38mi75g3rpnuti1021n5eokbvmotlsek.apps.googleusercontent.com',         // Your google Client ID
        'client_secret' => 'qnNSvwXvB_V34wL-52TguQOW', // Your google Client Secret
        'redirect' => 'http://127.0.0.1:8000/login/google/callback',
    ],

];
