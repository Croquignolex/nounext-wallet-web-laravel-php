<?php

return [
    'name' => env('COMPANY_NAME', 'Laravel'),
    'web_site' => env('COMPANY_WEB_SITE', 'http://laravel.com'),
    'no-reply' => [
        'address' => env('COMPANY_NO_REPLY_MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('COMPANY_NO_REPLY_MAIL_FROM_NAME', 'Example'),
    ],
];
