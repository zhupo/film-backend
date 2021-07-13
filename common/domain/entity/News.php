<?php

namespace common\domain\entity;

/**
 * Class News
 *
 * @property
 * @property string $url
 * @property string $title
 * @property string $summary
 * @property string $praise
 * @package common\domain\entity
 */
class News extends Entity
{
    public static function tableName()
    {
        return 'news';
    }
}