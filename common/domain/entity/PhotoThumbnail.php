<?php

namespace common\domain\entity;

/**
 * Class PhotoThumbnail
 *
 * @package common\domain\entity
 */
class PhotoThumbnail extends Entity
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'photo_thumbnail';
    }
}
