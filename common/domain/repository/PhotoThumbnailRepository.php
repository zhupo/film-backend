<?php

namespace common\domain\repository;

use common\domain\entity\Photo;
use common\domain\entity\PhotoThumbnail;
use yii\base\BaseObject;

/**
 * Class PhotoThumbnailRepository
 *
 * @package common\domain\repository
 */
class PhotoThumbnailRepository extends BaseObject
{
    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function findPhotosByPhoto($photoId)
    {
        $qb = PhotoThumbnail::find()->select('photo_thumbnail.*')
            ->andWhere(['photoId' => $photoId])
            ->orderBy('createdAt DESC');
        return $qb->all();
    }

    /**
     * @param $id
     * @return PhotoThumbnail|null
     */
    public function find($id)
    {
        $photoThumbnail = PhotoThumbnail::findOne(['id' => $id]);
        return $photoThumbnail;
    }
}
