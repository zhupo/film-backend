<?php

namespace frontend\modules\api\controllers;

use frontend\modules\api\services\UserService;

class UserController extends BaseController
{
    /**
     * @var UserService
     */
    private $service;

    public function init()
    {
        parent::init();
        $this->service = new UserService();
    }

    public function actionView($userId)
    {
        return [
            'statusCode' => 200,
            'data' => $this->service->view($userId)
        ];
    }
}