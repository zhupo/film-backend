<?php

namespace frontend\libraries\behaviors;

use DateTime;
use Yii;
use yii\base\Behavior;
use yii\web\Session;
use yii\web\User;
use yii\web\UserEvent;
use common\libraries\web\RequestsHelper;
use common\domain\repository\UserRepository;

class LoginMeta extends Behavior
{

    public function events()
    {
        return [
            User::EVENT_AFTER_LOGIN => 'afterLogin',
        ];
    }

    /**
     * update Last Login time and Last Login Ip
     *
     * @param UserEvent $event
     */
    public function afterLogin(UserEvent $event)
    {
        $uid = $event->identity->getId();
        $ip = RequestsHelper::getIp();
        $datetime = new DateTime();

        $user = (new UserRepository())->findOneById($uid);
        $user->lastLoginTime = $datetime->getTimestamp();
        $user->lastLoginIp = $ip;
        $userRepo = new UserRepository();
        $userRepo->save($user);

        $message = sprintf(
            'User `%s` logged in from %s on %s.',
            $uid,
            $ip,
            $datetime->format(DateTime::ATOM)
        );

        // record the session and cookies
        $cookies = Yii::$app->response->getCookies()->toArray();
        if (is_array($cookies)) {
            /**
             * @var String $key
             * @var yii\web\Cookie $val
             */
            foreach ($cookies as $key => $val) {
                if (isset($val->value) && !empty($val->value)) {
                    $cookies[$key]->value = '*****' . substr($val->value, -10);
                }
            }
        }
        Yii::info($uid . " login set cookies: " . json_encode($cookies));
        $session = Yii::$app->getSession();
        if (!empty($session) && $session instanceof Session) {
            $sessionId = $session->getId();
            Yii::info($uid . " login set session: " . '*****' . substr($sessionId, -10));
        }
    }
}
