<?php

namespace common\domain\entity;


/**
 * Class User
 *
 * @property
 * @property string $password
 * @package common\domain\entity
 */
class User extends Entity
{
    public static function tableName()
    {
        return 't_user';
    }

    public function validatePassword($password)
    {
        return password_verify($password, $this->password);
    }
}
