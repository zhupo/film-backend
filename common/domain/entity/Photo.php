<?php

namespace common\domain\entity;

/**
 * Class Photo
 *
 * @package common\domain\entity
 */
class Photo extends Entity
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'photo';
    }
}
