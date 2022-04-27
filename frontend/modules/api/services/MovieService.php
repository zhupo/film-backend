<?php

namespace frontend\modules\api\services;

use Yii;

class MovieService extends BaseService
{
    public function getMovies()
    {
        $sql = $this->getMoviesSql();
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

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

    /**
     * @param $userId
     * @param $movieId
     * @return bool
     */
    public function isWishMovie($userId, $movieId): bool
    {
        $sql = $this->getIsWishMovieSql();
        $values = [
            ':userId' => $userId,
            ':movieId' => $movieId,
        ];
        $result = Yii::$app->db->createCommand($sql)->bindValues($values)->queryOne();
        return $result ? true : false;
    }

    public function addWishMovie($userId, $movieId)
    {
        $sql = $this->getAddWishMovieSql();
        $values = [
            ':userId' => $userId,
            ':movieId' => $movieId,
        ];
        $updateWishNumberSql = $this->getUpdateWishNumberSql();
        Yii::$app->db->createCommand($sql)->bindValues($values)->execute();
        Yii::$app->db->createCommand($updateWishNumberSql)->bindValue(':movieId', $movieId)->execute();
    }

    public function cancelWishMovie($userId, $movieId)
    {
        Yii::$app->db->transaction(function () use ($userId, $movieId) {
            $deleteWishMovieSql = $this->getDeleteWishMovieSql();
            $updateWishNumberSql = $this->getUpdateWishNumberSql(false);

            Yii::$app->db->createCommand($deleteWishMovieSql)->bindValues([
                ':userId' => $userId,
                ':movieId' => $movieId
            ])->execute();

            Yii::$app->db->createCommand($updateWishNumberSql)->bindValue(':movieId', $movieId)->execute();
        });
    }

    /**
     * @param bool $isAdd
     * @return string
     */
    private function getUpdateWishNumberSql(bool $isAdd = true): string
    {
        if ($isAdd) {
            return <<<SQL
UPDATE t_movie SET wish_num = wish_num + 1 WHERE movie_id = :movieId;
SQL;
        } else {
            return <<<SQL
UPDATE t_movie SET wish_num = IF(wish_num > 0, wish_num - 1, 0) WHERE movie_id = :movieId;
SQL;
        }
    }

    /**
     * @return string
     */
    private function getDeleteWishMovieSql(): string
    {
        return <<<SQL
DELETE FROM t_wishmovie WHERE user_id = :userId AND movie_id =:movieId;
SQL;
    }

    private function getAddWishMovieSql(): string
    {
        return <<<SQL
INSERT INTO t_wishmovie(user_id,movie_id) VALUES(:userId,:movieId);
SQL;
    }

    private function getIsWishMovieSql(): string
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

    /**
     * @return string
     */
    public function getMoviesSql():string
    {
        return <<<SQL
SELECT * FROM t_schedule INNER JOIN t_movie ON t_schedule.movie_id = t_movie.movie_id;
SQL;
    }
}