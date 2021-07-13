<?php

namespace frontend\modules\api\services;

use yii\base\BaseObject;

/**
 * Class BaseService
 *
 * @package frontend\modules\api\services
 */
class BaseService extends BaseObject
{
    /**
     * @param array $items
     * @return array
     */
    protected function formatData(array $items)
    {
        return array_map(function ($item) {
            if (isset($item['createdAt'])) {
                $item['createdAt'] = date('Y-m-d', $item['createdAt']);
            }
            if (isset($item['updatedAt'])) {
                $item['updatedAt'] = date('Y-m-d', $item['updatedAt']);
            }
            return $item;
        }, $items);
    }
}
