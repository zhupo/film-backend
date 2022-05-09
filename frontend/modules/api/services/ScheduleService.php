<?php

namespace frontend\modules\api\services;

use Yii;

class ScheduleService extends BaseService
{
    /**
     * @param int $movieId
     * @return array
     * @throws \yii\db\Exception
     */
    public function getScheduleByMovieId(int $movieId): array
    {
        $sql = $this->getScheduleByMovieIdSql();
        $date = date('Y-m-d');
        $qb = Yii::$app->db->createCommand($sql);
        $qb->bindValues([
            ':movieId' => $movieId,
            ':today' =>  $date
        ]);
        $cinemaArray = $qb->queryAll();

        $qb = Yii::$app->db->createCommand($this->getScheduleByMovieIdSql(true));
        $qb->bindValues([
            ':movieId' => $movieId,
            ':today' =>  $date
        ]);
        $cinemaScheduleArray = $qb->queryAll();

        return [
            'hasCinemaInfo' => [$cinemaArray],
            'cinemaScheduleInfo' => [$cinemaScheduleArray]
        ];
    }

    /**
     * @param false $needCinema
     * @return string
     */
    private function getScheduleByMovieIdSql($needCinema = false): string
    {
        $sql = "SELECT a.* FROM t_schedule a INNER JOIN 
(
SELECT * FROM t_schedule 
WHERE movie_id = :movieId
AND show_date > :today
ORDER BY show_date, show_time DESC
) b ON a.`show_date` = b.`show_date`";

        if ($needCinema) {
            $sql = "SELECT ts.*, tc.* FROM t_schedule ts
INNER JOIN t_cinema tc ON ts.cinema_id = tc.cinema_id
INNER JOIN
(
SELECT * FROM t_schedule 
WHERE movie_id = :movieId 
AND show_date > :today
ORDER BY show_date, show_time DESC
) c ON ts.`schedule_id` = c.`schedule_id`";
        }

        return $sql;
    }
}