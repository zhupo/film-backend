<?php

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'frontend' => [
        'baseUrl' => '',
        'identityCookieName' => '_identity-frontend',
        'cookieValidationKey' => 'WXdUsZ8LBbEshsQwbPSy0aTZPzYWPGud',
        'sessionCookieName' => '_sessionid-frontend',
        'sessionTimeout' => 2592000,
        'csrfParam' => '_csrf-frontend'
    ],
    'redis' => [
        'host' => '127.0.0.1',
        'port' => 6379,
        'database' => 0
    ]
];
