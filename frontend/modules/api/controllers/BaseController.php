<?php

namespace frontend\modules\api\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

abstract class BaseController extends Controller
{
    public function behaviors()
    {
        return ArrayHelper::merge([
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
//                        'roles' => ['@'] //?允许游客访问 @游客不允许访问
                    ]
                ]
            ],
        ],parent::behaviors());
    }

    public $serializer = [
        'class' => '\yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    /**
     * @param $data
     * @return mixed
     * @throws \yii\base\InvalidConfigException
     */
    protected function serializeData($data)
    {
        return Yii::createObject($this->serializer)->serialize($data);
    }

    /**
     * @param \yii\base\Action $action
     * @param mixed $result
     * @return mixed
     * @throws \yii\base\InvalidConfigException
     */
    public function afterAction($action, $result)
    {
        $result = parent::afterAction($action, $result);
        $result = $this->serializeData($result);

        return $result;
    }

    /**
     * @return array
     */
    public function verbs()
    {
        return [];
    }

}
