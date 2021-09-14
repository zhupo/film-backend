<?php

namespace frontend\modules\api\controllers;

use frontend\modules\api\services\MovieService;

class MovieController extends BaseController
{
    /**
     * @var MovieService
     */
    private $service;

    public function init()
    {
        parent::init();
        $this->service = new MovieService();
    }

    /**
     * @return \string[][][]
     */
    public function actionIndex()
    {
        return [
            'data' => [
                [
                    'actor' => '刘昊然',
                    'cinema_id' => 7,
                    'director' => '迪恩·德布洛斯',
                    'hall_name' => '1号激光厅',
                    'intro' => '统领伯克岛的酋长嗝嗝（刘昊然 配音），与阿丝翠德（亚美莉卡·费雷拉 配音）共同打造了一个奇妙而热闹的飞龙乌托邦。一只雌性光煞飞龙的意外出现，加上一个前所未有的威胁的到来，令嗝嗝和没牙仔不得不离开自己唯一的家园，前往他们本以为只存在于神话之中的隐秘之境。在发现自己真正的命运之后，飞龙与骑士将携手殊死奋战，保护他们所珍爱的一切。',
                    'language' => '英语',
                    'movie_id' => 1,
                    'movie_long' => '130分钟',
                    'name' => '驯龙高手3',
                    'poster' => '/images/movie/hot1.jpg',
                    'price' => 45,
                    'public_date' => '2018-12-11',
                    'schedule_id' => 79,
                    'score' => 9.2,
                    'seat_info' => '[]',
                    'show_date' => '2099-12-31',
                    'show_time' => '08:05',
                    'type' => '动漫',
                    'wish_num' => 0,
                ],
                [
                    'actor' => '刘昊然',
                    'cinema_id' => 7,
                    'director' => '迪恩·德布洛斯',
                    'hall_name' => '1号激光厅',
                    'intro' => '统领伯克岛的酋长嗝嗝（刘昊然 配音），与阿丝翠德（亚美莉卡·费雷拉 配音）共同打造了一个奇妙而热闹的飞龙乌托邦。一只雌性光煞飞龙的意外出现，加上一个前所未有的威胁的到来，令嗝嗝和没牙仔不得不离开自己唯一的家园，前往他们本以为只存在于神话之中的隐秘之境。在发现自己真正的命运之后，飞龙与骑士将携手殊死奋战，保护他们所珍爱的一切。',
                    'language' => '英语',
                    'movie_id' => 1,
                    'movie_long' => '130分钟',
                    'name' => '狂暴凶狮',
                    'poster' => '/images/movie/hot2.jpg',
                    'price' => 45,
                    'public_date' => '2018-12-11',
                    'schedule_id' => 79,
                    'score' => 9.1,
                    'seat_info' => '[]',
                    'show_date' => '2099-12-31',
                    'show_time' => '08:05',
                    'type' => '动漫',
                    'wish_num' => 0,
                ],
                [
                    'actor' => '刘昊然',
                    'cinema_id' => 7,
                    'director' => '迪恩·德布洛斯',
                    'hall_name' => '1号激光厅',
                    'intro' => '统领伯克岛的酋长嗝嗝（刘昊然 配音），与阿丝翠德（亚美莉卡·费雷拉 配音）共同打造了一个奇妙而热闹的飞龙乌托邦。一只雌性光煞飞龙的意外出现，加上一个前所未有的威胁的到来，令嗝嗝和没牙仔不得不离开自己唯一的家园，前往他们本以为只存在于神话之中的隐秘之境。在发现自己真正的命运之后，飞龙与骑士将携手殊死奋战，保护他们所珍爱的一切。',
                    'language' => '英语',
                    'movie_id' => 1,
                    'movie_long' => '130分钟',
                    'name' => '夏日友人怅',
                    'poster' => '/images/movie/hot3.jpg',
                    'price' => 45,
                    'public_date' => '2018-12-11',
                    'schedule_id' => 79,
                    'score' => 9.0,
                    'seat_info' => '[]',
                    'show_date' => '2099-12-31',
                    'show_time' => '08:05',
                    'type' => '动漫',
                    'wish_num' => 0,
                ],
                [
                    'actor' => '刘昊然',
                    'cinema_id' => 7,
                    'director' => '迪恩·德布洛斯',
                    'hall_name' => '1号激光厅',
                    'intro' => '统领伯克岛的酋长嗝嗝（刘昊然 配音），与阿丝翠德（亚美莉卡·费雷拉 配音）共同打造了一个奇妙而热闹的飞龙乌托邦。一只雌性光煞飞龙的意外出现，加上一个前所未有的威胁的到来，令嗝嗝和没牙仔不得不离开自己唯一的家园，前往他们本以为只存在于神话之中的隐秘之境。在发现自己真正的命运之后，飞龙与骑士将携手殊死奋战，保护他们所珍爱的一切。',
                    'language' => '英语',
                    'movie_id' => 1,
                    'movie_long' => '130分钟',
                    'name' => '比悲伤更悲伤的故事',
                    'poster' => '/images/movie/hot4.jpg',
                    'price' => 45,
                    'public_date' => '2018-12-11',
                    'schedule_id' => 79,
                    'score' => 8.9,
                    'seat_info' => '[]',
                    'show_date' => '2099-12-31',
                    'show_time' => '08:05',
                    'type' => '动漫',
                    'wish_num' => 0,
                ],
                [
                    'actor' => '刘昊然',
                    'cinema_id' => 7,
                    'director' => '迪恩·德布洛斯',
                    'hall_name' => '1号激光厅',
                    'intro' => '统领伯克岛的酋长嗝嗝（刘昊然 配音），与阿丝翠德（亚美莉卡·费雷拉 配音）共同打造了一个奇妙而热闹的飞龙乌托邦。一只雌性光煞飞龙的意外出现，加上一个前所未有的威胁的到来，令嗝嗝和没牙仔不得不离开自己唯一的家园，前往他们本以为只存在于神话之中的隐秘之境。在发现自己真正的命运之后，飞龙与骑士将携手殊死奋战，保护他们所珍爱的一切。',
                    'language' => '英语',
                    'movie_id' => 1,
                    'movie_long' => '130分钟',
                    'name' => '惊奇队长',
                    'poster' => '/images/movie/hot5.jpg',
                    'price' => 45,
                    'public_date' => '2018-12-11',
                    'schedule_id' => 79,
                    'score' => 8.8,
                    'seat_info' => '[]',
                    'show_date' => '2099-12-31',
                    'show_time' => '08:05',
                    'type' => '动漫',
                    'wish_num' => 0,
                ],
                [
                    'actor' => '刘昊然',
                    'cinema_id' => 7,
                    'director' => '迪恩·德布洛斯',
                    'hall_name' => '1号激光厅',
                    'intro' => '统领伯克岛的酋长嗝嗝（刘昊然 配音），与阿丝翠德（亚美莉卡·费雷拉 配音）共同打造了一个奇妙而热闹的飞龙乌托邦。一只雌性光煞飞龙的意外出现，加上一个前所未有的威胁的到来，令嗝嗝和没牙仔不得不离开自己唯一的家园，前往他们本以为只存在于神话之中的隐秘之境。在发现自己真正的命运之后，飞龙与骑士将携手殊死奋战，保护他们所珍爱的一切。',
                    'language' => '英语',
                    'movie_id' => 1,
                    'movie_long' => '130分钟',
                    'name' => '我的英雄学校',
                    'poster' => '/images/movie/hot6.jpg',
                    'price' => 45,
                    'public_date' => '2018-12-11',
                    'schedule_id' => 79,
                    'score' => 8.7,
                    'seat_info' => '[]',
                    'show_date' => '2099-12-31',
                    'show_time' => '08:05',
                    'type' => '动漫',
                    'wish_num' => 0,
                ],
                [
                    'actor' => '刘昊然',
                    'cinema_id' => 7,
                    'director' => '迪恩·德布洛斯',
                    'hall_name' => '1号激光厅',
                    'intro' => '统领伯克岛的酋长嗝嗝（刘昊然 配音），与阿丝翠德（亚美莉卡·费雷拉 配音）共同打造了一个奇妙而热闹的飞龙乌托邦。一只雌性光煞飞龙的意外出现，加上一个前所未有的威胁的到来，令嗝嗝和没牙仔不得不离开自己唯一的家园，前往他们本以为只存在于神话之中的隐秘之境。在发现自己真正的命运之后，飞龙与骑士将携手殊死奋战，保护他们所珍爱的一切。',
                    'language' => '英语',
                    'movie_id' => 1,
                    'movie_long' => '130分钟',
                    'name' => '驯龙高手3',
                    'poster' => '/images/movie/hot7.jpg',
                    'price' => 45,
                    'public_date' => '2018-12-11',
                    'schedule_id' => 79,
                    'score' => 0,
                    'seat_info' => '[]',
                    'show_date' => '2099-12-31',
                    'show_time' => '08:05',
                    'type' => '动漫',
                    'wish_num' => 0,
                ],
                [
                    'actor' => '刘昊然',
                    'cinema_id' => 7,
                    'director' => '迪恩·德布洛斯',
                    'hall_name' => '1号激光厅',
                    'intro' => '统领伯克岛的酋长嗝嗝（刘昊然 配音），与阿丝翠德（亚美莉卡·费雷拉 配音）共同打造了一个奇妙而热闹的飞龙乌托邦。一只雌性光煞飞龙的意外出现，加上一个前所未有的威胁的到来，令嗝嗝和没牙仔不得不离开自己唯一的家园，前往他们本以为只存在于神话之中的隐秘之境。在发现自己真正的命运之后，飞龙与骑士将携手殊死奋战，保护他们所珍爱的一切。',
                    'language' => '英语',
                    'movie_id' => 1,
                    'movie_long' => '130分钟',
                    'name' => '驯龙高手3',
                    'poster' => '/images/movie/hot8.jpg',
                    'price' => 45,
                    'public_date' => '2018-12-11',
                    'schedule_id' => 79,
                    'score' => 0,
                    'seat_info' => '[]',
                    'show_date' => '2099-12-31',
                    'show_time' => '08:05',
                    'type' => '动漫',
                    'wish_num' => 0,
                ],
                [
                    'actor' => '刘昊然',
                    'cinema_id' => 7,
                    'director' => '迪恩·德布洛斯',
                    'hall_name' => '1号激光厅',
                    'intro' => '统领伯克岛的酋长嗝嗝（刘昊然 配音），与阿丝翠德（亚美莉卡·费雷拉 配音）共同打造了一个奇妙而热闹的飞龙乌托邦。一只雌性光煞飞龙的意外出现，加上一个前所未有的威胁的到来，令嗝嗝和没牙仔不得不离开自己唯一的家园，前往他们本以为只存在于神话之中的隐秘之境。在发现自己真正的命运之后，飞龙与骑士将携手殊死奋战，保护他们所珍爱的一切。',
                    'language' => '英语',
                    'movie_id' => 1,
                    'movie_long' => '130分钟',
                    'name' => '驯龙高手3',
                    'poster' => '/images/movie/hot9.jpg',
                    'price' => 45,
                    'public_date' => '2018-12-11',
                    'schedule_id' => 79,
                    'score' => 0,
                    'seat_info' => '[]',
                    'show_date' => '2099-12-31',
                    'show_time' => '08:05',
                    'type' => '动漫',
                    'wish_num' => 0,
                ],
            ]
        ];
    }

    /**
     * @param $movieName
     * @return array
     */
    public function actionSearch($movieName)
    {
        return [
            'statusCode' => 200,
            'data' => $this->service->searchByName($movieName)
        ];
    }

    /**
     * @param $cinemaName
     * @return array
     */
    public function actionSearchCinema($cinemaName)
    {
        return [
            'statusCode' => 200,
            'data' => $this->service->searchCinemaByName($cinemaName),
        ];
    }

    /**
     * Path /movies/view?id={$id}
     * @param $id
     * @return array
     */
    public function actionView($id)
    {
        return [
            'statusCode' => 200,
            'data' => $this->service->view($id)
        ];
    }

    public function actionIsWishMovie($userId, $movieId)
    {
        return [
            'statusCode' => 200,
            'data' => $this->service->isWishMovie($userId, $movieId)
        ];
    }
}