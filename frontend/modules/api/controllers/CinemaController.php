<?php

namespace frontend\modules\api\controllers;

use frontend\modules\api\services\CinemaService;
use yii\web\Cookie;

class CinemaController extends BaseController
{
    /**
     * @var CinemaService
     */
    private $service;

    public function init()
    {
        parent::init();
        $this->service = new CinemaService();
    }

    public function actionIndex()
    {
        return [
            'success_code' => 200,
            'data' => $this->service->getCinemaList(),
        ];
    }
}