<?php

namespace common\domain\entity;

class Good extends Entity
{
    public static function tableName()
    {
        return 'good';
    }

    /**
     * @param array $attributes
     */
    public function createComment(array $attributes)
    {
        $good = new static();
        $good->title = $attributes['title'];
        $good->marketValue = $attributes['marketValue'];
        $good->sellPrice = $attributes['sellPrice'];
        $good->url = $attributes['url'];
        $good->message = $attributes['message'];
        $good->click = $attributes['click'];
        $good->stockQuantity = $attributes['stockQuantity'];
        $good->save();

        return $good;

    }
}
