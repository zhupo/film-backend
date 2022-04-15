<?php

namespace frontend\modules\api;

use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\rest\UrlRule;
use yii\web\GroupUrlRule;

class Module extends \yii\base\Module implements BootstrapInterface
{
    public function init()
    {
        parent::init();
        \Yii::setAlias('@portalUrl', '/' . $this->id);
        \Yii::configure($this, require(__DIR__ . '/config.php'));
    }

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        $uniqueId = $this->getUniqueId();

        $app->getUrlManager()->addRules([
            [
                'class' => GroupUrlRule::class,
                'prefix' => $uniqueId,
                'rules' => array_merge(
                    require __DIR__ . '/route-movie.php',
                    require __DIR__ . '/route-cinema.php',
                    require __DIR__ . '/route-user.php'
                )
            ],
            [
                'class' => UrlRule::class,
                'controller' => [
                    "$uniqueId/auth",
                ],
                'extraPatterns' => [
                    'DELETE {id}/<action:[\w\-]+>' => '<action>',
                    'GET <action:[\w\-]+>' => '<action>',
                    'GET {id}/<action:[\w\-]+>' => '<action>',
                    'PUT {id}/<action:[\w\-]+>' => '<action>',
                    'PATCH {id}/<action:[\w\-]+>' => '<action>',
                    'POST <action:[\w\-]+>' => '<action>',
                ]
            ]
        ]);
//        echo json_encode($app->getUrlManager()->rules);die;
    }
}