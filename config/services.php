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
        'client_id' => '179539962963-8cat187rp91qse4m413mh54v6jl8o42k.apps.googleusercontent.com',
        'client_secret' => '4N1ZY2Fg8OskB3ZFslqSYJRW',
        'redirect' => 'http://localhost/ecommerce/callback/google',
      ], 
                                 
      'facebook' => [
        'client_id' => '826312304827516',
        'client_secret' => 'c885ebea64618338b4c64e7e72e42bfa',
        'redirect' => 'http://localhost/ecommerce/callback/facebook',
      ], 
];
