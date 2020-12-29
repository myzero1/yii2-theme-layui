<?php

namespace myzero1\layui\controllers;

use yii\web\Controller;

/**
 * Default controller for the `modules` module
 */
class SiteController extends Controller
{
    /**
     * Renders the index view for the module，render the layout
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'layout';
        return $this->render('index');
    }

    /**
     * Placeholdon layout.
     *
     * @return string
     */
    public function actionLayout()
    {
        $this->layout = '@vendor/myzero1/yii2-theme-layui/src/views/layouts/layout';
        return $this->render('@vendor/myzero1/yii2-theme-layui/src/views/site/index');
    }
}
