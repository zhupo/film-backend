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
     * @param int $id
     * @return array|false|\yii\db\DataReader
     * @throws \yii\db\Exception
     */
    public function getCinemaById(int $id)
    {
        $sql = $this->getCinemaByIdSql();
        $qb = Yii::$app->db->createCommand($sql);
        $qb = $qb->bindParam(':cinemaId', $id);

        return $qb->queryOne();
    }

    /**
     * @param int $id
     * @return array[]
     * @throws \yii\db\Exception
     */
    public function getCurrentCinemaMovieSchedule(int $id): array
    {
        $sql = $this->getCurrentCinemaMovieScheduleSql();
        $qb = Yii::$app->db->createCommand($sql);
        $currentDate = date('Y-m-d');
        $currentTime = date('H:i');
        $qb = $qb->bindValues([
            ':cinemaId' => $id,
            ':currentDate' => $currentDate,
            ':currentTime' => $currentTime
        ]);

        $movieArray = $qb->queryAll();
        $movieScheduleArray = [];
        foreach ($movieArray as $movie) {
            $sql = <<<SQL
SELECT * 
FROM t_schedule schedule 
    INNER JOIN t_movie movie ON schedule.movie_id = movie.movie_id 
WHERE schedule.movie_id = :movieId 
  AND schedule.cinema_id = :cinemaId;
SQL;
            $qb = Yii::$app->db->createCommand($sql);
            $qb = $qb->bindValues([
                ':cinemaId' => $id,
                ':movieId' => $movie['movie_id']
            ]);
            $movieScheduleArray[] = $qb->queryAll();
        }

        return [
            'hasMovieInfo' => $movieArray,
            'movieScheduleInfo' => $movieScheduleArray
        ];
    }

    /**
     * @return string
     */
    private function getCurrentCinemaMovieScheduleSql(): string
    {
        $sql = <<<SQL
SELECT a.* FROM t_movie a INNER JOIN (
SELECT tm.movie_id FROM t_schedule ts 
INNER JOIN t_movie tm ON ts.movie_id = tm.movie_id
WHERE cinema_id = :cinemaId 
AND 
(
show_date > :currentDate
OR 
(show_date = :currentDate AND show_time < :currentTime)
)
GROUP BY tm.movie_id
) AS b ON a.movie_id = b.movie_id;
SQL;
        return $sql;

    }

    /**
     * @return string
     */
    private function getCinemaByIdSql(): string
    {
        $sql = <<<SQL
SELECT * FROM t_cinema WHERE cinema_id = :cinemaId LIMIT 1;
SQL;

        return $sql;
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