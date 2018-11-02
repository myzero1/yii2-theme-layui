<?php

namespace myzero1\layui\assets\php\components;

use yii\web\AssetBundle;

/**
 * Main asset for the `layui` theming
 */

class Asset extends AssetBundle
{
    public $jsVer = '1.735.1';
    public $cssVer = '1.735.1';

    function init(){
        parent::init();

        self::addAssetsVer($this->js, $this->jsVer, $this->css, $this->cssVer, __CLASS__);
    }

    public $sourcePath = '@vendor/myzero1/yii2-theme-layui/src/assets/static';
    //public $baseUrl = '@web';
    public $css = [
    ];

    public $js = [
    ];

    public $depends = [
    ];

    public static function addAssetsVer(&$js, $jsVer, &$css, $cssVer, $class){
        // check ver
        // $key = str_replace('\\', '-', __CLASS__);
        // $key = str_replace('\\', '-', $class);
        $key = md5($class);
        $files = [];
        $files['js'] = \Yii::getAlias(sprintf('@webroot/assets/asset_js_ver_%s_%s',$jsVer, $key));
        $files['css'] = \Yii::getAlias(sprintf('@webroot/assets/asset_css_ver_%s_%s',$cssVer, $key));

        foreach ($files as $key => $value) {
            if (!is_file($value)) {
                \Yii::$app->assetManager->forceCopy = true;
                file_put_contents($value, '');
            }
        }

        // add ver
        $jsNew = [];
        $cssNew = [];
        if (is_array($js)) {
            $jsArr = $js;

            foreach ($jsArr as $jsItem) {
                $jsNew[] = $jsItem . '?ver=' . $jsVer;
            }
            $js = $jsNew;
        }
        if (is_array($css)) {
            $cssArr = $css;
            $cssNew = [];
            foreach ($cssArr as $cssItem) {
                $cssNew[] = $cssItem . '?ver=' . $cssVer;
            }
            $css = $cssNew;
        }
    }
}
