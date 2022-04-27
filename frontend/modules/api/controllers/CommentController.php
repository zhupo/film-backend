<?php

namespace frontend\modules\api\controllers;

use common\domain\entity\Comment;
use frontend\modules\api\services\CommentService;
use Yii;

class CommentController extends BaseController
{
    /** @var CommentService */
    private $service;

    public function init()
    {
        parent::init();
        $this->service = new CommentService();
    }

    /**
     * @param $movieId
     * @return array
     */
    public function actionIndex($movieId)
    {
        $comments = $this->service->getAllUserPassComment($movieId);

        return [
            'successCode' => 200,
            'data' => $comments
        ];
    }

    public function actionCreate()
    {
        $comment = new Comment();
        return $comment->createComment($this->request->post());
    }
}
