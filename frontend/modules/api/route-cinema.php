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
            // GET /cinema
            'GET' => 'cinema/index',
            // GET /cinema/view?id=1
            'GET view' => 'cinema/view',
            //
            'GET get-current-cinema-movie-schedule' => 'cinema/get-current-cinema-movie-schedule'
        ],
    ],
];
