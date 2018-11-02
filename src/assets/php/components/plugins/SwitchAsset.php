<?php

namespace myzero1\layui\assets\php\components\plugins;

use yii\web\AssetBundle;

/**
 * Main asset for the `adminlte` theming
 */

class SwitchAsset extends AssetBundle
{
    public $jsVer = '1.735.1';
    public $cssVer = '1.735.1';
    function init(){
       \myzero1\layui\assets\php\components\Asset::addAssetsVer($this->js, $this->jsVer, $this->css, $this->cssVer, __CLASS__);
    }
    public $sourcePath = '@vendor/myzero1/yii2-theme-layui/src/assets/static/plugins';
    //public $baseUrl = '@web';
    public $css = [
        'libs/bootstrap-switch/bootstrap-switch.css',
    ];

    public $js = [
        'libs/bootstrap-switch/bootstrap-switch.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
