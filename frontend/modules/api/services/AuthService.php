<?php

namespace frontend\modules\api\services;

use frontend\models\LoginForm;
use yii\base\BaseObject;

/**
 * Class AuthService
 *
 * @package frontend\modules\api\services
 */
class AuthService extends BaseObject
{
    public function login(LoginForm $form)
    {
        if ($form->login()) {
            return [
                'url' => '/site/index'
            ];
        }
    }
}
