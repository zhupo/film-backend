<?php

namespace frontend\modules\api\services;

use Yii;

class CinemaService extends BaseService
{
    /**
     * @param string $name
     * @return array|\yii\db\DataReader
     * @throws \yii\db\Exception
     */
    public function getCinemaList($name = '')
    {
        $sql = $this->getSearchCinemaByNameSql();
        $qb = Yii::$app->db->createCommand($sql);
        if ($name) {
            $name = '%' . $name . '%';
            $qb = $qb->bindParam(':name', $name);
        }

        return $qb->queryAll();
    }

    /**
     * @return string
     */
    private function getSearchCinemaByNameSql()
    {
        $sql = "SELECT * FROM t_schedule 
    INNER JOIN t_cinema ON t_schedule.cinema_id = t_cinema.cinema_id 
    INNER JOIN t_movie ON t_schedule.movie_id = t_movie.movie_id;";

        return $sql;
    }
}