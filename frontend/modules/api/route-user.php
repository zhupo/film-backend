<?php

use yii\rest\UrlRule;

return [
    [
        'class' => UrlRule::class,
        'controller' => ["api/users" => "api"],
        'tokens' => [
            '{id}' => '<id:\\d+>',
        ],
        'patterns' => [
            'GET view' => 'user/view',
        ],
    ],
];
