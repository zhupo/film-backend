<?php

$params = require __DIR__ . '/params.php';

$cookieSecure = strpos($params['frontend']['baseUrl'], 'https') === 0;

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'request' => [
            'class' => 'common\libraries\web\Request',
            'csrfParam' => $params['frontend']['csrfParam'],
            'csrfCookie' => [
                'httpOnly' => true,
                'secure' => $cookieSecure,
            ],
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => $params['frontend']['cookieValidationKey'],
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
            'enableCsrfValidation' => true,
            'hostInfo' => $params['frontend']['baseUrl'],
        ],
        'response' => [
            'class' => 'common\libraries\web\Response',
        ],
        'session' => [
            'class' => 'yii\redis\Session',
            'name' => $params['frontend']['sessionCookieName'],
            'keyPrefix' => isset($params['frontend']['sessionKeyPrefix']) ? $params['frontend']['sessionKeyPrefix'] : null,
            'timeout' => $params['frontend']['sessionTimeout'],
            'cookieParams' => [
                'httpOnly' => true,
                'secure' => $cookieSecure,
            ],
        ],
        'user' => [
            'class' => 'common\libraries\web\User',
            'identityClass' => 'common\libraries\web\UserIdentity',
            'enableAutoLogin' => true,
            'enableSession' => true,
            'loginUrl' => ['/user/login'],
            'identityCookie' => [
                'name' => $params['frontend']['identityCookieName'],
                'httpOnly' => true,
                'secure' => $cookieSecure,
            ],
//            'as user' => [
//                'class' => 'frontend\libraries\behaviors\LoginMeta',
//            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'baseUrl' => $params['frontend']['baseUrl'],
            'hostInfo' => $params['frontend']['baseUrl'],
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<action:[a-z0-9\-]+>' => 'site/<action>',
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'] = [
        'debug',
        'gii',
        'api'
    ];
    $config['modules'] = [
        'debug' => [
            'class' => 'yii\debug\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
        ],
        'gii' => [
            'class' => 'yii\gii\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
        ],
        'api' => [
            'class' => 'frontend\modules\api\Module'
        ]
    ];
}

return $config;
