<?php

namespace myzero1\layui\controllers;

use yii\web\Controller;

/**
 * Default controller for the `modules` module
 */
class BusinessController extends Controller
{
    /**
     * Renders the index view for the module，render the layout
     * @return string
     */
    public function actionIntroduction()
    {
        return $this->render('introduction');
    }
}
