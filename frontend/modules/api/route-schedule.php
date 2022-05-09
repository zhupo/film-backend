<?php

use yii\rest\UrlRule;

return [
    [
        'class' => UrlRule::class,
        'controller' => ["api/schedules" => "api"],
        'tokens' => [
            '{id}' => '<id:\\d+>',
        ],
        'patterns' => [
            // GET /schedules/search-by-movie-id?movieId=1
            'GET search-by-movie-id' => 'schedule/get-schedule-by-movie-id',
            // GET /comments/view?userId=1&movieId=2
            'GET view' => 'schedule/view'
        ],
    ],
];
