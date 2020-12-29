<?php

namespace myzero1\layui\controllers;

use yii\web\Controller;
use myzero1\layui\models\form\LoginForm;

/**
 * Default controller for the `modules` module
 */
class SysController extends Controller
{
    /**
     * Renders the main msg of site
     * @return string
     */
    public function actionMain()
    {
        return $this->render('main');
    }

    /**
     * Renders the main msg of notice
     * @return string
     */
    public function actionNotice()
    {
        return $this->render('notice');
    }

    /**
     * Renders the main msg of notice
     * @return string
     */
    public function actionE403()
    {
        return $this->render('e403');
    }

    /**
     * Renders the main msg of notice
     * @return string
     */
    public function actionE404()
    {
        return $this->render('e404');
    }

    /**
     * Renders the main msg of notice
     * @return string
     */
    public function actionE500()
    {
        return $this->render('e500');
    }
}
