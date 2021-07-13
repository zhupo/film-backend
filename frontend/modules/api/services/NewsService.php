<?php

namespace frontend\modules\api\services;

use common\domain\entity\News;
use common\domain\repository\NewsRepository;
use common\libraries\web\Request;

/**
 * Class NewsService
 *
 * @package frontend\modules\api\services
 */
class NewsService extends BaseService
{
    /**
     * @var NewsRepository
     */
    private $newsRepository;

    public function init()
    {
        $this->newsRepository = new NewsRepository();
    }

    /**
     * @return array
     */
    public function getNewList()
    {
        $news = $this->newsRepository->findNews();
        return ['items' => $this->formatData($news)];
    }

    /**
     * @param $id
     * @return News|null
     */
    public function getNewById($id)
    {
        $new = $this->newsRepository->findNew($id);
        $new['createdAt'] = date('Y-m-d', $new['createdAt']);
        return $new;
    }

    /**
     * @param Request $request
     * @return News
     */
    public function createNew(Request $request)
    {
        $new = new News();
        $new->url = $request->post('url');
        $new->title = $request->post('title');
        $new->summary = $request->post('summary');
        $new->praise = $request->post('praise');
        $new->save();

        return $new;
    }
}
