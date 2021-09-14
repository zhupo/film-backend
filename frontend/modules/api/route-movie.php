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
            // GET /movies/search-cinema?cinemaName={cinemaName}
            'GET search-cinema' => 'movie/search-cinema',
            // GET /movies/view?id={id}
            'GET view' => 'movie/view',
            //'GET is-wish-movie' => 'movie/isWishMovie',
            'GET is-wish-movie' => 'movie/is-wish-movie',
            // GET /lines/{id}
//            'GET {id}' => 'movie/view',
        ],
    ],
];
