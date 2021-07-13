<?php

namespace frontend\modules\api\controllers;

use frontend\modules\api\controllers\BaseController;

/**
 * Class CartController
 * @package frontend\modules\api\controllers
 */
class CartController extends BaseController
{
    /**
     * @param string $goodIds
     * @return array
     */
    public function actionIndex(string $goodIds): array
    {
        $goodIds = explode(',', $goodIds);
        $data = [];
        $goods = [
            [
                'title' => '华为 (HUAWEI) 荣耀6plus 128G双16G版',
                'sellPrice' => 2195,
                'thumbPath' => 'image/product/img_1.png'
            ],
            [
                'title' => '苹果Apple 12plus 256G双8G版',
                'sellPrice' => 12195,
                'thumbPath' => 'image/product/img_2.png'
            ],
            [
                'title' => '小米 (Xiao Mi) 小米9 64G双8G版',
                'sellPrice' => 2195,
                'thumbPath' => 'image/product/img_3.png'
            ]
        ];
        foreach ($goodIds as $key => $goodId) {
            $goods[$key]['id'] = $goodId;
            $data[] = $goods[$key];
        }
        return $data;
    }
}