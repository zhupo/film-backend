<?php

namespace frontend\modules\api\services;

use common\domain\entity\User;
use frontend\models\LoginForm;
use Yii;
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
                'success_code' => 200,
                'userId' => Yii::$app->user->identity->getId()
            ];
        }
    }

    public function isGuest()
    {
        return Yii::$app->user->isGuest;
    }
}
