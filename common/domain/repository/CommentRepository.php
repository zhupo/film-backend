<?php

namespace common\domain\repository;

use common\domain\entity\Comment;
use yii\base\BaseObject;

/**
 * Class CommentRepository
 *
 * @package common\domain\repository
 */
class CommentRepository extends BaseObject
{
    public const LIMIT_NUM = 10;

    /**
     * @param $entityId
     * @param int $lastCreatedAt
     * @return array|\yii\db\ActiveRecord[]
     */
    public function findPhotoCommentByEntityId($entityId, int $page = 0)
    {
        $qb = Comment::find()->select('comment.*')
            ->where('entityId = :entityId', [':entityId' => $entityId])
            ->andWhere(['entityType' => Comment::ENTITY_TYPE_PHOTO])
            ->andWhere('id > :maxId', [':maxId' => ($page - 1) * self::LIMIT_NUM])
            // ->andWhere('createdAt <= :lastCreatedAt', [':lastCreatedAt' => $lastCreatedAt])
            ->limit(self::LIMIT_NUM);
            // ->orderBy('createdAt DESC');
        return $qb->all();
    }
}
