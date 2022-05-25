<?php

namespace frontend\modules\api\services;

use common\domain\entity\Comment;
use Yii;

class CommentService extends BaseService
{
    public function getAllUserPassComment($movieId)
    {
        $isPass = Comment::IS_PASS;
        $sql = $this->getAllUserPassCommentSql();
        return Yii::$app->db->createCommand($sql)->bindValues([
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
        $result = Yii::$app->db->createCommand($sql)->bindValues([
            ':userId'  => $userId,
            ':movieId' => $movieId
        ])->queryOne();
        $result = $result == false ? [] : $result;

        return $result;
    }

    public function updateComment(array $postData)
    {
        $sql = <<<SQL
SELECT comment_id FROM t_comment WHERE movie_id = :movieId AND user_id = :userId LIMIT 1
SQL;
        $comment = Yii::$app->db->createCommand($sql)->bindValues([
            ':movieId' => $postData['movieId'],
            ':userId' => $postData['userId']
        ])->queryOne();
        if ($comment) {
            $sql = <<<SQL
UPDATE t_comment 
SET user_score = :userScore, 
    comment_content = :commentContent, 
    comment_date = :commentDate,
    support_num = :supportNumber,
    is_pass = :isPass
WHERE comment_id = :commentId;
SQL;

            Yii::$app->db->createCommand($sql)->bindValues([
                ':userScore' => intval($postData['score']),
                ':commentContent' => $postData['commentContent'],
                ':commentDate' => $postData['commentDate'],
                ':supportNumber' => 0,
                ':isPass' => 0,
                ':commentId' => intval($comment['comment_id'])
            ])->execute();
        } else {
            $sql = <<<SQL
INSERT INTO 
    t_comment(user_id,movie_id,user_score,comment_content,comment_date,support_num,is_pass) 
    VALUES(:userId,:movieId,:userScore,:commentContent,:commentDate,:supportNum,:isPass);
SQL;
            Yii::$app->db->createCommand($sql)->bindValues([
                ':userId' => $postData['userId'],
                ':movieId' => $postData['movieId'],
                ':userScore' => $postData['score'],
                ':commentContent' => $postData['commentContent'],
                ':commentDate' => $postData['commentDate'],
                ':supportNum' => 0,
                ':isPass' => 0,
            ])->execute();
        }

        return true;
    }

    private function getAllUserPassCommentSql()
    {
        return <<<SQL
SELECT * FROM t_user user INNER JOIN t_comment comment ON user.user_id = comment.user_id WHERE comment.movie_id = :movieId AND comment.is_pass = :isPass;
SQL;
    }
}