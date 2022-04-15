<?php

namespace frontend\modules\api\services;

use phpDocumentor\Reflection\Types\String_;
use Yii;

class UserService extends BaseService
{
    public function view($userId)
    {
        $sql = $this->getUserInfoSql();
        return Yii::$app->db->createCommand($sql)->bindParam(':userId', $userId)->queryOne();
    }

    /**
     * @return string
     */
    private function getUserInfoSql(): string
    {
        return <<<SQL
SELECT * from t_user WHERE user_id = :userId LIMIT 1;
SQL;
    }
}