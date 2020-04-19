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
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

//
//    'facebook'=>[
//        'client_id'=> '168896243463508',
//        'client_secret'=> 'fca68d210abea40227f12799c9b9bb83',
//        'redirect' => 'http://laravel.411fan.com/login',// 'http://localhost:8000/login',//'http://staging.triviahedge.com/login',
//
//    ],
    'facebook'=>[
        'client_id'=> '168897993463333',
        'client_secret'=> '8ae5805d392738117cdb927287cd62d9',
        'redirect' => 'http://laravel.411fan.com/sAuth/facebook',//'http://laravel.411fan.com/login',// //'http://staging.triviahedge.com/login',

    ],

    'twitter' => [
        'client_id' => 'y0WQVuiPAWSKgmSFWe2nZY90g',
        'client_secret' => 'kMCXPodSTjbjZB4hH28FNmmdnignxwIflXjky13Jr0owyWIZSv',
        'redirect' => 'http://laravel.411fan.com/sAuth/twitter',
    ],

    'google' => [
        'client_id' => '500546255832-3lvta17l1dabgtsu5heuhk1925pdmabi.apps.googleusercontent.com',
        'client_secret' => 'mSeJskKmYQF4TPiXXN211ZYj',
        'redirect' => 'http://laravel.411fan.com/sAuth/google',//'http://laravel.411fan.com/gAuth',
    ],


    'stripe' => [
        'model'  => \App\Http\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],


];
