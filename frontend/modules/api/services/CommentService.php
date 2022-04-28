<?php

namespace frontend\modules\api\services;

use common\domain\entity\Comment;

class CommentService extends BaseService
{
    public function getAllUserPassComment($movieId)
    {
        $isPass = Comment::IS_PASS;
        $sql = $this->getAllUserPassCommentSql();
        return \Yii::$app->db->createCommand($sql)->bindValues([
            ':movieId' => $movieId,
            ':isPass' => $isPass
        ])->queryAll();
    }

    /**
     * @param $userId
     * @param $movieId
     * @return array|\yii\db\DataReader
     * @throws \yii\db\Exception
     */
    public function getCommentByUserAndMovieId($userId, $movieId)
    {
        $sql = <<<SQL
SELECT * FROM t_comment WHERE user_id = :userId AND movie_id = :movieId LIMIT 1;
SQL;
        $result = \Yii::$app->db->createCommand($sql)->bindValues([
            ':userId'  => $userId,
            ':movieId' => $movieId
        ])->queryOne();
        $result = $result == false ? [] : $result;

        return $result;
    }

    private function getAllUserPassCommentSql()
    {
        return <<<SQL
SELECT * FROM t_user user INNER JOIN t_comment comment ON user.user_id = comment.user_id WHERE comment.movie_id = :movieId AND comment.is_pass = :isPass;
SQL;
    }
}