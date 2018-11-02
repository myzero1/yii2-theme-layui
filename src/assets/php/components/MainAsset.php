<?php

namespace myzero1\layui\assets\php\components;

use yii\web\AssetBundle;

/**
 * Main asset for the `adminlte` theming
 */

class MainAsset extends AssetBundle
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
        'resources/css/public.css',
        'resources/css/font_seraph.css',
        'resources/css/custom.css',
        'http://at.alicdn.com/t/font_899576_31p50u8efv5.css',
    ];

    public $js = [
        'resources/js/custom.js',
    ];

    public $depends = [
        'myzero1\layui\assets\php\components\plugins\LayuiAsset',
        'myzero1\layui\assets\php\components\plugins\LayerAsset',
    ];
}
