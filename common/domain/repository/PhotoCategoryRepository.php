<?php

namespace common\domain\repository;

use common\domain\entity\PhotoCategory;
use yii\base\BaseObject;

/**
 * Class PhotoCategoryRepository
 *
 * @package common\domain\repository
 */
class PhotoCategoryRepository extends BaseObject
{
    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function findCategories()
    {
        $qb = PhotoCategory::find()->select('photo_category.*')->orderBy('createdAt DESC');
        return $qb->all();
    }

    /**
     * @param $id
     * @return PhotoCategory|null
     */
    public function find($id)
    {
        /** @var PhotoCategory $photoCategory */
        $photoCategory = PhotoCategory::findOne(['id' => $id]);
        return $photoCategory;
    }
}
