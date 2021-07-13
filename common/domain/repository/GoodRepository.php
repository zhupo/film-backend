<?php

namespace common\domain\repository;
use common\domain\entity\Good;
use yii\base\BaseObject;

class GoodRepository extends BaseObject
{
    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function findGoods()
    {
        $qb = Good::find()->select('good.*');
        return $qb->all();
    }
}