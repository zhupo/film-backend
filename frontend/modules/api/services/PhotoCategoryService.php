<?php

namespace frontend\modules\api\services;

use common\domain\repository\PhotoCategoryRepository;
use common\libraries\web\Request;

/**
 * Class PhotoCategoryService
 *
 * @package frontend\modules\api\services
 */
class PhotoCategoryService extends BaseService
{
    /** @var PhotoCategoryRepository */
    private $repository;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->repository = new PhotoCategoryRepository();
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getPhotoCategories()
    {
        return $this->repository->findCategories();
    }
}