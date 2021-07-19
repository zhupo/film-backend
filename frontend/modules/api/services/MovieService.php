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
        return Yii::$app->db->createCommand($sql)->bindParam(':name', $name)->queryAll();
    }

    public function searchCinemaByName($name)
    {
        $sql = $this->getSearchCinemaByNameSql($name);
        $name = '%' . $name . '%';
        return Yii::$app->db->createCommand($sql)->bindParam(':name', $name)->queryAll();
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