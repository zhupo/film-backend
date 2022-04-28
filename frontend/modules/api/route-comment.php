<?php

use yii\rest\UrlRule;

return [
    [
        'class' => UrlRule::class,
        'controller' => ["api/comments" => "api"],
        'tokens' => [
            '{id}' => '<id:\\d+>',
        ],
        'patterns' => [
            // GET /comments
            'GET' => 'comment/index',
            // GET /comments/view?userId=1&movieId=2
            'view' => 'comment/view'
        ],
    ],
];
