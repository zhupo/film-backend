<?php

namespace common\domain\entity;

/**
 * Class Comment
 *
 * @property
 * @property string $content
 * @property int $createBY
 * @package common\domain\entity
 */
class Comment extends Entity
{
    public const ENTITY_TYPE_PHOTO = 1;

    public const IS_PASS = 1;

    public static function tableName()
    {
        return 't_comment';
    }

    /**
     * @param array $attributes
     */
    public function createComment(array $attributes)
    {
        $comment = new static();
        $comment->content = $attributes['content'];
        $comment->entityType = self::ENTITY_TYPE_PHOTO;
        $comment->entityId = $attributes['entityId'];
        $comment->createBy = 1;
        $comment->save();

        return $comment;
    }
}