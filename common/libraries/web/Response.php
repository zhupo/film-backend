<?php

namespace common\libraries\web;

/**
 * Class Response
 *
 * @package common\libraries\web
 */
class Response extends \yii\web\Response
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // Security headers
        // Ask web server(nginx) do it for us
        // Because there are also static resources

        // No cache headers
        $this->headers->setDefault('Pragma', 'no-cache');
        $this->headers->setDefault('Expires', '0');
        $this->headers->setDefault('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    }
}