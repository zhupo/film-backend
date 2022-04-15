<?php

use yii\rest\UrlRule;

return [
    [
        'class' => UrlRule::class,
        'controller' => ["api/cinemas" => "api"],
        'tokens' => [
            '{id}' => '<id:\\d+>',
        ],
        'patterns' => [
            // GET /movies
            'GET' => 'cinema/index',
        ],
    ],
];
