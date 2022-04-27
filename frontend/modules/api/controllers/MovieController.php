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
     * @return array
     */
    public function actionIndex(): array
    {
        return [
            'data' => $this->service->getMovies()
        ];
    }

    /**
     * @param $movieName
     * @return array
     */
    public function actionSearch($movieName): array
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
    public function actionSearchCinema($cinemaName): array
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
    public function actionView($id): array
    {
        return [
            'statusCode' => 200,
            'data' => $this->service->view($id)
        ];
    }

    /**
     * @return array
     */
    public function actionAddWishMovie(): array
    {
        $userId = $this->request->post('userId');
        $movieId = $this->request->post('movieId');
        $this->service->addWishMovie($userId, $movieId);
        return [
            'statusCode' => 200
        ];
    }

    public function actionIsWishMovie($userId, $movieId)
    {
        $result = $this->service->isWishMovie($userId, $movieId);
        return [
            'statusCode' => $result ? 200 : 500
        ];
    }

    /**
     * @return array
     */
    public function actionCancelWishMovie(): array
    {
        $userId = $this->request->post('userId');
        $movieId = $this->request->post('movieId');

        $this->service->cancelWishMovie($userId, $movieId);
        return ['statusCode' => 200];
    }
}