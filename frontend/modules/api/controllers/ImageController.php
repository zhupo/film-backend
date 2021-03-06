<?php

namespace frontend\modules\api\controllers;

use Yii;

class ImageController extends BaseController
{
    /**
     * @return \string[][][]
     */
    public function actionIndex()
    {
        return [
            'items' => [
                [
                    'url' => 'images/carousel-01.jpg'
                ],
                [
                    'url' => 'images/carousel-02.jpg'
                ],
            ]
        ];
    }

    /**
     * @return \array[][]
     */
    public function actionTables()
    {
        return [
            'items' => [
                [
                    'id' => 1,
                    'title' => '首页',
                    'imgSrc' => 'images/index.png',
                    'routerName' => ['name' => 'home']
                ],
                [
                    'id' => 2,
                    'title' => '会员',
                    'imgSrc' => 'images/member.png',
                    'routerName' => ['name' => 'vip']
                ],
                [
                    'id' => 3,
                    'title' => '购物车',
                    'imgSrc' => 'images/shopping-cart.png',
                    'routerName' => ['name' => 'shopCart']
                ],
                [
                    'id' => 4,
                    'title' => '我的',
                    'imgSrc' => 'images/mine.png',
                    'routerName' => ['name' => 'mine']
                ],
            ]
        ];
    }

    public function actionShowOff()
    {
        return [
            'items' => [
                [
                    'url' => 'images/联系我们.png',
                    'title' => '联系我们',
                    'router' => ['name' => 'news.list']
                ],
                [
                    'url' => 'images/商品.png',
                    'title' => '商品展示',
                    'router' => ['name' => 'good.list', 'params' => ['page' => 1]]
                ],
                [
                    'url' => 'images/发送.png',
                    'title' => '图文分享',
                    'router' => ['name' => 'photo.list', 'params' => ['categoryId' => 0]]
                ],
                [
                    'url' => 'images/留言.png',
                    'title' => '留言反馈',
                    'router' => ['name' => 'news.list']
                ],
                [
                    'url' => 'images/新闻.png',
                    'title' => '新闻资讯',
                    'router' => ['name' => 'news.list']
                ],
                [
                    'url' => 'images/关于我们.png',
                    'title' => '关于我们',
                    'router' => ['name' => 'news.list']
                ],
                [
                    'url' => 'images/优惠.png',
                    'title' => '优惠区域',
                    'router' => ['name' => 'news.list']
                ],
                [
                    'url' => 'images/新人专享.png',
                    'title' => '新人专享',
                    'router' => ['name' => 'news.list']
                ],
                [
                    'url' => 'images/研发体系补贴.png',
                    'title' => '百亿补贴',
                    'router' => ['name' => 'news.list']
                ]
            ]
        ];
    }
}