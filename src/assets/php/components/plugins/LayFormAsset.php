<?php

namespace myzero1\layui\assets\php\components\plugins;

use yii\web\AssetBundle;

/**
 * Main asset for the `adminlte` theming
 */

class LayFormAsset extends AssetBundle
{
    public $jsVer = '1.735.1';
    public $cssVer = '1.735.1';
    function init(){
        parent::init();

        \myzero1\layui\assets\php\components\Asset::addAssetsVer($this->js, $this->jsVer, $this->css, $this->cssVer, __CLASS__);
    }

    public $sourcePath = '@vendor/myzero1/yii2-theme-layui/src/assets/static';

    public $css = [
        'plugins/use/css/layform.css',
    ];

    public $js = [
        'plugins/use/layform.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'myzero1\layui\assets\php\components\plugins\LayuiAsset',
        'myzero1\layui\assets\php\components\plugins\LayerAsset',
    ];
}
