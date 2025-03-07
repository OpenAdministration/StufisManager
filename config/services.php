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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'stumv' => [
        // using socialiteproviders/laravelpassport
        'client_id' => env('STUMV_CLIENT_ID'),
        'client_secret' => env('STUMV_CLIENT_SECRET'),
        'redirect' => rtrim((string) env('APP_URL', 'http://localhost:8000'), '/').'/auth/callback',
        'host' => env('STUMV_HOST'),
        'logout_path' => env('STUMV_LOGOUT_PATH', 'logout'),
        'group-mapping' => [
            'login' => env('STUMV_GROUP_LOGIN', 'login'),
            'admin' => env('STUMV_GROUP_ADMIN'),
        ],
    ],

    'hostsharing' => [
        'user' => env('HS_USER'),
        'password' => env('HS_PASSWORD'),
    ],

];
