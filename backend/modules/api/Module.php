<?php

namespace backend\modules\api;

use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\rest\UrlRule;

class Module extends \yii\base\Module implements BootstrapInterface
{

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        $uniqueId = $this->getUniqueId();

        $app->getUrlManager()->addRules([
            [
                'class' => UrlRule::class,
                'controller' => [
                    "$uniqueId/user",
                ],
                'extraPatterns' => [
                    'DELETE {id}/<action:[\w\-]+>' => '<action>',

                    'GET {id}/<action:[\w\-]+>' => '<action>',
                    'PUT {id}/<action:[\w\-]+>' => '<action>',
                    'POST {id}/<action:[\w\-]+>' => '<action>',
                    'POST <action:[\w\-]+>' => '<action>',
                ]
            ],
        ]);
    }
}