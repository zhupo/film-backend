<?php

namespace frontend\modules\api\controllers;

use common\domain\repository\GoodRepository;
use frontend\modules\api\services\PhotoService;

/**
 * Class GoodController
 * @package frontend\modules\api\controllers
 */
class GoodController extends BaseController
{
    /** @var PhotoService */
    private $service;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->service = new PhotoService();
    }

    /**
     * @return array[]
     */
    public function actionIndex()
    {
        $goods = (new GoodRepository())->findGoods();
        return $goods;
        return [
            [
                'id' => 1,
                'title' => '华为荣耀plus 荣耀青春娱乐版，(HUAWEI)',
                'marketPrece' => 2499,
                'sellPrice' => 2195,
                'url' => 'images/product/img.png',
                'message' => '荣耀6plus，该机型分为两款型号，分别为PE1和PE2',
                'click' => 999,
                'stockQuantity' => 666,
                'createdAt' => 1604735561,
                'updatedAt' => 1604735561,
            ],
            [
                'id' => 2,
                'title' => '小米8',
                'marketPrece' => 3699,
                'sellPrice' => 2595,
                'url' => 'images/product/img_1.png',
                'message' => '小米8，该机型分为两款型号，分别为PE1和PE2',
                'click' => 666,
                'stockQuantity' => 888,
                'createdAt' => 1604735561,
                'updatedAt' => 1604735561,
            ],
            [
                'id' => 3,
                'title' => '华为荣耀8',
                'marketPrece' => 2699,
                'sellPrice' => 2295,
                'url' => 'images/product/img_2.png',
                'message' => '荣耀8，该机型分为两款型号，分别为PE1和PE2',
                'click' => 999,
                'stockQuantity' => 666,
                'createdAt' => 1604735561,
                'updatedAt' => 1604735561,
            ],
            [
                'id' => 4,
                'title' => '苹果12puls',
                'marketPrece' => 9999,
                'sellPrice' => 9199,
                'url' => 'images/product/img_3.png',
                'message' => '苹果12plus，该机型分为两款型号，分别为PE1和PE2',
                'click' => 999,
                'stockQuantity' => 666,
                'createdAt' => 1604735561,
                'updatedAt' => 1604735561,
            ],
            [
                'id' => 5,
                'title' => '三星pro',
                'marketPrece' => 2499,
                'sellPrice' => 2195,
                'url' => 'images/product/img_4.png',
                'message' => '三星pro，该机型分为两款型号，分别为PE1和PE2',
                'click' => 999,
                'stockQuantity' => 666,
                'createdAt' => 1604735561,
                'updatedAt' => 1604735561,
            ],
            [
                'id' => 6,
                'title' => '锤子手机',
                'marketPrece' => 9998,
                'sellPrice' => 8888,
                'url' => 'images/product/img_1.png',
                'message' => '锤子手机，该机型分为两款型号，分别为PE1和PE2',
                'click' => 999,
                'stockQuantity' => 666,
                'createdAt' => 1604735561,
                'updatedAt' => 1604735561,
            ],
            [
                'id' => 7,
                'title' => '三星pro',
                'marketPrece' => 2499,
                'sellPrice' => 2195,
                'url' => 'images/product/img_2.png',
                'message' => '三星pro，该机型分为两款型号，分别为PE1和PE2',
                'click' => 999,
                'stockQuantity' => 666,
                'createdAt' => 1604735561,
                'updatedAt' => 1604735561,
            ],
            [
                'id' => 8,
                'title' => '锤子手机',
                'marketPrece' => 9998,
                'sellPrice' => 8888,
                'url' => 'images/product/img_3.png',
                'message' => '锤子手机，该机型分为两款型号，分别为PE1和PE2',
                'click' => 999,
                'stockQuantity' => 666,
                'createdAt' => 1604735561,
                'updatedAt' => 1604735561,
            ],
        ];
    }

    public function actionView(int $id)
    {
        return [
            'id' => $id,
            'title' => '新科 S2300 无线麦克风 无线手持话筒 双手麦 KTV 舞台',
            'number' => 'SD3985948554',
            'stockQuantity' => '20',
            'marketPrice' => '1998',
            'sellPrice' => '998',
            'createdAt' => '2021-01-18',
            'updatedAt' => '2021-01-18',
        ];
    }

    public function actionImages(int $id):array
    {
        return [
            'items' => [
                [
                    'url' => 'images/product/img.png'
                ],
                [
                    'url' => 'images/product/img_1.png'
                ],
            ]
        ];
    }
}
