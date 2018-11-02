<?php

namespace myzero1\layui\assets\php\components\plugins;

use yii\web\AssetBundle;

/**
 * Main asset for the `adminlte` theming
 */

class LayuiAsset extends AssetBundle
{
    public $jsVer = '1.735.1';
    public $cssVer = '1.735.1';

    function init(){
        parent::init();

        \myzero1\layui\assets\php\components\Asset::addAssetsVer($this->js, $this->jsVer, $this->css, $this->cssVer, __CLASS__);
    }

    public $sourcePath = '@vendor/myzero1/yii2-theme-layui/src/assets/static';
    //public $baseUrl = '@web';
    public $css = [
        'plugins/libs/layui/css/layui.css',
    ];

    public $js = [
        'plugins/libs/layui/layui.js',
    ];

    public $depends = [
    ];
}
