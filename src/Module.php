<?php

namespace myzero1\layui;

/**
 * modules module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'myzero1\layui\controllers';

    public $defaultRoute = 'site';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here

        // $this->defaultRoute ='index';
        $this->layoutPath = \Yii::getAlias('@vendor/myzero1/yii2-theme-layui/src/views/layouts');

/*
        $this->assetManager->bundles['myzero1\layui\assets\php\components\LayoutAsset']['noticeUrl'] = $this->id . '/site/notice';
        $this->assetManager->bundles['myzero1\layui\assets\php\components\LayoutAsset']['mainUrl'] = $this->id . '/site/main';
        $this->assetManager->bundles['myzero1\layui\assets\php\components\LayoutAsset']['copyright'] = '<p><span>yii2-theme-layui copyright @2018-2038 myzero1</span></p>';

*/

        $this->assetManager->forceCopy = true;

        \Yii::$app->params['z1layui']['moduleId'] = $this->id;

        $params = require __DIR__ . '/params.php';
        \Yii::$app->params['layuiTheme'] = $params['layuiTheme'];

        if (!isset(\Yii::$app->params['layuiTheme']['mainUrl'])) {
            \Yii::$app->params['layuiTheme']['mainUrl'] = $this->id . '/site/main';
        }

        if (!isset(\Yii::$app->params['layuiTheme']['noticeUrl'])) {
            \Yii::$app->params['layuiTheme']['noticeUrl'] = $this->id . '/site/notice';
        }

        if (!isset(\Yii::$app->params['layuiTheme']['copyright'])) {
            \Yii::$app->params['layuiTheme']['copyright'] = '<p><span>yii2-theme-layui copyright @2018-2038 myzero1</span></p>';
        }

    }
}
