<?php

return [
    'as contentNegotiator' => [
        'class' => 'yii\filters\ContentNegotiator',
        'formats' => [
            'application/json' => yii\web\Response::FORMAT_JSON,
        ],
    ],
];