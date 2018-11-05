<?php

namespace myzero1\layui\assets\php\components;

use yii\web\AssetBundle;

/**
 * Main asset for the `adminlte` theming
 */

class LayoutAsset extends AssetBundle
{
    public $jsVer = '1.735.1';
    public $cssVer = '1.735.1';
    public $mainUrl = '/main';
    public $noticeUrl = '/notice';//false
    public $copyright = '
    <p>
        <span>copyright @2018-2028 myzero1</span>
        <a href="https://github.com/myzero1/yii2-theme-layui" target="_blank">
            <img class="layui-nav-img userAvatar" src="LayoutAssetBundleBaseUrl/resources/images/myzero1.jpg" style="margin-left:10px;cursor:pointer;">
        </a>
    </p>';//false

    function init(){
        parent::init();

        \myzero1\layui\assets\php\components\Asset::addAssetsVer($this->js, $this->jsVer, $this->css, $this->cssVer, __CLASS__);
    }

    public $sourcePath = '@vendor/myzero1/yii2-theme-layui/src/assets/static';
    //public $baseUrl = '@web';
    public $css = [
        'resources/css/index.css',
        'resources/css/font_seraph.css',
        'resources/css/custom.css',
        'http://at.alicdn.com/t/font_899576_31p50u8efv5.css',
    ];

    public $js = [
        'resources/js/index.js',
        'resources/js/cache.js',
        'resources/js/custom.js',
    ];

    public $depends = [
        'myzero1\layui\assets\php\components\plugins\LayuiAsset',
    ];
}
