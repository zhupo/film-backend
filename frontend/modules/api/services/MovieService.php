<?php

namespace frontend\modules\api\services;

use Yii;

class MovieService extends BaseService
{
    /**
     * @param string $name
     * @return array
     */
    public function searchByName(string $name)
    {
        $sql = $this->getSearchByNameSql($name);
        $name = '%' . $name . '%';
        $movies = Yii::$app->db->createCommand($sql)->bindParam(':name', $name)->queryAll();
        $data = [];
        foreach ($movies as $movie) {
            $data[$movie['movie_id']] = $movie;
        }

        return array_values($data);
    }

    public function searchCinemaByName($name)
    {
        $sql = $this->getSearchCinemaByNameSql();
        $name = '%' . $name . '%';
        return Yii::$app->db->createCommand($sql)->bindParam(':name', $name)->queryAll();
    }

    public function view($id)
    {
        $sql = $this->getViewMovieSql();
        return Yii::$app->db->createCommand($sql)->bindParam(':movieId', $id)->queryOne();
    }

    public function isWishMovie($userId, $movieId)
    {
        $sql = $this->getIsWishMovieSql();
        $values = [
            ':userId' => $userId,
            ':movieId' => $movieId,
        ];
        $result = Yii::$app->db->createCommand($sql)->bindValues($values)->query();
        return empty($result) ? false : true;
    }

    private function getIsWishMovieSql()
    {
        return <<<SQL
SELECT * FROM t_wishmovie WHERE user_id = :userId AND movie_id = :movieId LIMIT 1;
SQL;

    }

    public function getViewMovieSql()
    {
        return <<<SQL
SELECT * FROM t_movie WHERE movie_id = :movieId LIMIT 1;
SQL;

    }

    public function getSearchCinemaByNameSql()
    {
        return <<<SQL
SELECT * 
FROM t_schedule 
INNER JOIN t_cinema ON t_schedule.cinema_id = t_cinema.cinema_id 
INNER JOIN t_movie ON t_schedule.movie_id = t_movie.movie_id 
WHERE cinema_name LIKE :name;
SQL;

    }

    public function getSearchByNameSql()
    {
        return <<<SQL
SELECT * 
FROM t_schedule 
INNER JOIN t_movie ON t_schedule.movie_id = t_movie.movie_id 
WHERE name LIKE :name;
SQL;

    }
}