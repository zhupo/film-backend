<?php

namespace common\domain\entity;

/**
 * Class PhotoCategory
 *
 * @package common\domain\entity
 */
class PhotoCategory extends Entity
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'photo_category';
    }
}
