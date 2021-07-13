<?php

namespace common\domain\repository;

use common\domain\entity\Photo;
use yii\base\BaseObject;

/**
 * Class PhotoRepository
 *
 * @package common\domain\repository
 */
class PhotoRepository extends BaseObject
{
    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function findPhotosByCategory($photoCategory)
    {
        $qb = Photo::find()->select('photo.*');
            if ($photoCategory) {
                $qb->andWhere(['categoryId' => $photoCategory]);
            }
            $qb->orderBy('createdAt DESC');
        return $qb->all();
    }

    /**
     * @param $id
     * @return Photo|null
     */
    public function find($id)
    {
        $photo = Photo::findOne(['id' => $id]);
        return $photo;
    }
}
