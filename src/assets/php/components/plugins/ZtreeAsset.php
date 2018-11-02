<?php

namespace myzero1\layui\assets\php\components\plugins;

use yii\web\AssetBundle;

/**
 * Main asset for the `adminlte` theming
 */

class ZtreeAsset extends AssetBundle
{
    public $jsVer = '1.735.1';
    public $cssVer = '1.735.1';
    function init(){
        parent::init();

        \myzero1\layui\assets\php\components\Asset::addAssetsVer($this->js, $this->jsVer, $this->css, $this->cssVer, __CLASS__);
    }
    public $sourcePath = '@vendor/myzero1/yii2-theme-layui/src/assets/static';
    public $css = [
        'libs/ztree3/css/zTreeStyle/zTreeStyle.css',
        // 'libs/ztree3/css/metroStyle/metroStyle.css',
    ];

    public $js = [
        'libs/ztree3/js/jquery.ztree.core.min.js',
        'libs/ztree3/js/jquery.ztree.excheck.min.js',
        'libs/ztree3/js/jquery.ztree.exhide.min.js',
        'libs/ztree3/js/fuzzysearch.js',
        'use/ztree3.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
