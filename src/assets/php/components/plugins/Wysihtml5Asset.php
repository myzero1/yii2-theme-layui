<?php

namespace myzero1\layui\assets\php\components\plugins;

use yii\web\AssetBundle;

/**
 * Main asset for the `adminlte` theming
 */

class Wysihtml5Asset extends AssetBundle
{
    public $jsVer = '1.735.1';
    public $cssVer = '1.735.1';
    function init(){
        parent::init();

        \myzero1\layui\assets\php\components\Asset::addAssetsVer($this->js, $this->jsVer, $this->css, $this->cssVer, __CLASS__);
    }
    public $sourcePath = '@vendor/myzero1/yii2-theme-layui/src/assets/static';
    public $css = [
        'libs/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
    ];

    public $js = [
        'libs/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        'libs/bootstrap-wysihtml5/locales/bootstrap-wysihtml5.en-US.js',
        'libs/bootstrap-wysihtml5/locales/bootstrap-wysihtml5.zh-CN.js',
        'use/wysihtml5.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
