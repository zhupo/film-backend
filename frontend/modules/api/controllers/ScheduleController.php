<?php

namespace frontend\modules\api\controllers;

use frontend\modules\api\services\ScheduleService;

class ScheduleController extends BaseController
{
    /**
     * @var ScheduleService
     */
    private $service;

    public function init()
    {
        parent::init();
        $this->service = new ScheduleService();
    }

    /**
     * @param $movieId
     * @return array
     * @throws \yii\db\Exception
     */
    public function actionGetScheduleByMovieId($movieId)
    {
        return [
            'successCode' => 200,
            'data' => $this->service->getScheduleByMovieId($movieId)
        ];
    }
}