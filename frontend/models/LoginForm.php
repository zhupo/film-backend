<?php

namespace frontend\models;

use common\libraries\web\UserIdentity;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $userIdentity;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $userIdentity = $this->getUserIdentity();

            if (!$userIdentity || !$userIdentity->getUser()->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUserIdentity(), $this->rememberMe ? 3600*24*30 : 3600);
        }
        return false;
    }

    /**
     * @return null|UserIdentity
     */
    public function getUserIdentity()
    {
        if ($this->userIdentity === null) {
            $this->userIdentity = UserIdentity::findIdentityByUserName($this->username);
        }
        return $this->userIdentity;
    }
}
