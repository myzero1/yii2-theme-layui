<?php

namespace myzero1\layui\controllers;

use yii\web\Controller;

/**
 * Default controller for the `modules` module
 */
class UserController extends Controller
{
    /**
     * Renders the index view for the module，render the layout
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Renders the index view for the module，render the layout
     * @return string
     */
    public function actionCreate()
    {
        return $this->render('create');
    }

    /**
     * Renders the index view for the module，render the layout
     * @return string
     */
    public function actionInit()
    {
        if (\Yii::$app->request->isPost) {
            $iniSql = '
                CREATE TABLE IF NOT EXISTS `z1_user` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
                  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
                  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                  `status` smallint(6) NOT NULL DEFAULT 10,
                  `created_at` int(11) NOT NULL,
                  `updated_at` int(11) NOT NULL,
                  PRIMARY KEY (`id`),
                  UNIQUE KEY `username` (`username`),
                  UNIQUE KEY `email` (`email`),
                  UNIQUE KEY `password_reset_token` (`password_reset_token`)
                ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
            ';
            $result = \Yii::$app->db->createCommand($iniSql)->execute();

            \Yii::$app->getSession()->setFlash('success', '恭喜你，初始化操作成功。');
        }

        return $this->render('init');
    }

    /**
     * Renders the index view for the module，render the layout
     * @return string
     */
    public function actionRole()
    {
        return $this->render('role');
    }
}
