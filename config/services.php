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
        'domain' => 'sandbox05831da5163342b6868677c8aaf509bd.mailgun.org',
        'secret' => 'key-c929eec83cc4c2d30f25bcca1a360d86',
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key' => 'pk_test_faCj8JNyqTnGoBYEwyjJIjrS',
        'secret' => 'sk_test_GNsjS7QiPwgxVXbcBlPhV22s',
    ],

];
