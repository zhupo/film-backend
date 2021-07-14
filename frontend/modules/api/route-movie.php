<?php

use yii\rest\UrlRule;

return [
    [
        'class' => UrlRule::class,
        'controller' => ["api/movies" => "api"],
        'tokens' => [
            '{id}' => '<id:\\d+>',
        ],
        'patterns' => [
            // GET /movies
            'GET' => 'movie/index',
            // GET /lines/{id}
//            'GET {id}' => 'movie/view',
        ],
    ],
];
