<?php

$params = require __DIR__ . '/params.php';

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
//        'db' => $db,
//        'dbMigration' => $dbMigration,
    ],
    'params' => $params,
    'controllerMap' => [
//        'fixture' => [ // Fixture generation command line.
//            'class' => 'yii\faker\FixtureController',
//        ],
        'migrate' => [
            'class' => yii\console\controllers\MigrateController::class,
            'templateFile' => '@app/views/migration.php',
            'db' => 'dbMigration'
        ]
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
