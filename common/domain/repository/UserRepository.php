<?php

namespace common\domain\repository;

use common\domain\entity\User;
use yii\base\BaseObject;

class UserRepository extends BaseObject
{
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function findOneByLogin($username)
    {
        return User::findOne(['user_name' => $username]);
    }

    public function findOneById($id)
    {
        return User::findOne(['user_id' => $id]);
    }
}
