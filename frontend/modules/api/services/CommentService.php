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

    private function getAllUserPassCommentSql()
    {
        return <<<SQL
SELECT * FROM t_user user INNER JOIN t_comment comment ON user.user_id = comment.user_id WHERE comment.movie_id = :movieId AND comment.is_pass = :isPass;
SQL;
    }
}