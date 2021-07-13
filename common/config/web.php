<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$dbMigration = require  __DIR__ . '/db_migration.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'dbMigration' => $dbMigration,
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => $params['redis']['host'],
            'port' => $params['redis']['port'],
            'database' => $params['redis']['database'],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'] = [];
    $config['modules'] = [];
}

return $config;
