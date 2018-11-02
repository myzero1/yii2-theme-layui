<?php

namespace myzero1\layui\controllers;

use yii\web\Controller;
use myzero1\layui\models\form\LoginForm;

/**
 * Default controller for the `modules` module
 */
class SiteController extends Controller
{
    /**
     * Renders the index view for the module，render the layout
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'layout';
        return $this->render('index');
    }

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


    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        // var_dump(Yii::$app->getSecurity()->generatePasswordHash('123456'));exit;
        // if (!Yii::$app->user->isGuest) {
        //     return $this->goHome();
        // }

        $model = new LoginForm();
        // if ($model->load(Yii::$app->request->post()) && $model->login()) {
        //     return $this->goBack();
        // } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        // }
    }
}
