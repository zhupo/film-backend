<?php

namespace frontend\modules\api\controllers;

use frontend\modules\api\services\PhotoCategoryService;
use Yii;

class PhotoCategoryController extends BaseController
{
    /** @var PhotoCategoryService */
    private $photoCategoryService;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->photoCategoryService = new PhotoCategoryService();
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function actionIndex()
    {
        return $this->photoCategoryService->getPhotoCategories();
    }
}
