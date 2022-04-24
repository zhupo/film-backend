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
            'data' => $this->service->getMovies()
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