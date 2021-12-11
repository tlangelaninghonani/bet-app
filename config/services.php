<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => "776844087043-j9lvbifsdfgg1d641gqeml6h8j1lql1h.apps.googleusercontent.com",
        'client_secret' => "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",
        'redirect' => "http://mabuza-app.herokuapp.com0/google_auth_callback"
    ],
    'facebook' => [
        'client_id' => '478941016752764',
        'client_secret' => 'd8f0ca0cf0adfd768d4ced4533b3da47',
        'redirect' => 'https://127.0.0.1:8000/facebook_auth_callback',
    ],

];
