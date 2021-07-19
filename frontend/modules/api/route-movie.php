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
            // GET /movies/search?movieName={movieName}
            'GET search' => 'movie/search',
            // GEt /movies/search-cinema?cinemaName={cinemaName}
            'GET search-cinema' => 'movie/search-cinema'
            // GET /lines/{id}
//            'GET {id}' => 'movie/view',
        ],
    ],
];
