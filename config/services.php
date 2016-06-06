<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
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
        'client_id' => '1783259688574428',
        'client_secret' => '4d0515f2bed75284971aa032ef430bec',
        'redirect' => 'http://localhost:8000/callback/facebook',
    ],
    'twitter' => [
        'client_id' => 'R4fEOFJzmmroOProFCLSYloE7',
        'client_secret' => '	NtmCTwInHLnGaJlqNi9z2ohHmchUG3JxnSIpBn4khJeKAglo8E',
        'redirect' => 'http://kris1.co.nz/callback/twitter',
    ],

];
