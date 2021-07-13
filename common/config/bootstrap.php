<?php

use yii\helpers\ArrayHelper;

$params = require __DIR__ . '/params.php';

// Define host for swagger.
$frontendHost = parse_url($params['frontend']['baseUrl'], PHP_URL_HOST);
define('SWAGGER_FRONTEND_HOST', $frontendHost);
define('PRODUCT_CODE', 'ec185');
define('PRODUCT_NAME', 'rbc');

Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@BD/yii', dirname(dirname(__DIR__)) . '/libs/yii2-common/src');
