<?php

namespace myzero1\layui\controllers;

use yii\web\Controller;

/**
 * Default controller for the `modules` module
 */
class DocController extends Controller
{
    
    /**
     * Renders the index view for the module，render the layout
     * @return string
     */
    public function actionIcons()
    {
        return $this->render('icons');
    }
    
    /**
     * Renders the index view for the module，render the layout
     * @return string
     */
    public function actionAddress()
    {
        return $this->render('address');
    }
    
    /**
     * Renders the index view for the module，render the layout
     * @return string
     */
    public function actionNav()
    {
        return $this->render('nav');
    }

    /**
     * Renders the index view for the module，render the layout
     * @return string
     */
    public function actionBodytab()
    {
        return $this->render('bodytab');
    }
}
