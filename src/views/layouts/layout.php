<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

$bundle = myzero1\layui\assets\php\components\LayoutAsset::register($this);

$navsDefault = [
    "contentManagement" => [
        'topMenu' => [
            "menu" => "contentManagement",
            "title" => "内容管理",
            "icon" => "icon-text",
            "class" => "seraph icon-text",
        ],
        [
            "title" => "文章列表",
            "icon" => "&#xe63c;",
            "href" => "/user2",
            "spread" => false
        ],
        [
            "title" => "图片管理",
            "icon" => "&#xe634;",
            "href" => "gii/crud",
            "spread" => false
        ],
        [
            "title" => "其他页面",
            "icon" => "&#xe630;",
            "href" => "",
            "spread" => false,
            "children" => [
                [
                    "title" => "404页面",
                    "icon" => "&#xe61c;",
                    "href" => "gii/controller",
                    "spread" => false
                ],
                [
                    "title" => "登录",
                    "icon" => "&#xe609;",
                    "href" => "gii/form",
                    "spread" => false,
                    "target" => "_blank"
                ]
            ]
        ]
    ],
    "memberCenter" => [
        'topMenu' => [
            "menu" => "memberCenter",
            "title" => "用户中心",
            "icon" => "&#xe770;",
            "class" => "layui-icon",
        ],
        [
            "title" => "用户中心",
            "icon" => "&#xe66f;",
            "href" => "gii/module",
            "spread" => false
        ],
        [
            "title" => "会员等级",
            "icon" => "icon-vip",
            "href" => "gii/extension",
            "spread" => false
        ]
    ],
    "systemeSttings" => [
        'topMenu' => [
            "menu" => "systemeSttings",
            "title" => "系统设置",
            "icon" => "&#xe620;",
            "class" => "layui-icon",
        ],
        [
            "title" => "系统基本参数",
            "icon" => "&#xe631;",
            "href" => "gii/crud",
            "spread" => false
        ],
        [
            "title" => "系统日志",
            "icon" => "icon-log",
            "href" => "gii/form",
            "spread" => false
        ],
        [
            "title" => "友情链接",
            "icon" => "&#xe64c;",
            "href" => "gii/extension",
            "spread" => false
        ],
        [
            "title" => "图标管理",
            "icon" => "&#xe857;",
            "href" => "gii/module",
            "spread" => false
        ]
    ],
    "seraphApi" => [
        'topMenu' => [
            "menu" => "seraphApi",
            "title" => "使用文档",
            "icon" => "&#xe705;",
            "class" => "layui-icon",
        ],
        [
            "title" => "三级联动模块",
            "icon" => "icon-mokuai",
            "href" => "gii/form",
            "spread" => false
        ],
        [
            "title" => "bodyTab模块",
            "icon" => "icon-mokuai",
            "href" => "gii/crud",
            "spread" => false
        ],
        [
            "title" => "三级菜单",
            "icon" => "icon-mokuai",
            "href" => "gii/model",
            "spread" => false
        ]
    ]
];

if (isset(\Yii::$app->params['navs'])) {
    $navs = \Yii::$app->params['navs'];
} else {
    $navs = $navsDefault;
}

$topNavs = [];
foreach ($navs as $key => $value) {
    $topNavs[] = $navs[$key]['topMenu'];
    unset($navs[$key]['topMenu']);
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="main_body">

<div id="layui-navs" navs='<?=json_encode($navs, JSON_UNESCAPED_UNICODE)?>'></div>
<div id="index-bundle" base-url="<?=$bundle->baseUrl?>"></div>
<div id="notice-url" url="<?=$bundle->noticeUrl?>"></div>
<?php
    echo  Html::beginForm(['/site/logout'], 'post',['id' => 'logout-form'])
    . Html::endForm();
?>

<?php $this->beginBody() ?>

    <div class="layui-layout layui-layout-admin">
        <!-- 顶部 -->
        <div class="layui-header header">
            <div class="layui-main mag0">
                <a href="#" class="logo"><?=\Yii::$app->name?></a>
                <!-- 显示/隐藏菜单 -->
                <a href="javascript:;" class="seraph hideMenu icon-caidan">
                    <!-- <i class="layui-icon" data-icon="&#xe647;">&#xe647;</i> -->
                </a>
                <!-- 顶级菜单 -->
                <?php if (count($topNavs) > 1): ?>
                <ul class="layui-nav mobileTopLevelMenus" mobile>
                    <li class="layui-nav-item" data-menu="contentManagement">
                        <a href="javascript:;">
                            <i class="seraph icon-caidan"></i>
                            <!-- <i class="layui-icon" data-icon="&#xe653;">&#xe653;</i> -->
                            <cite>管理后台</cite>
                        </a>
                        <dl class="layui-nav-child">
                            <?php foreach ($topNavs as $key => $value): ?>
                            <dd  <?=$key==0 ? 'class="layui-this"' : ''?> data-menu="<?=$value['menu']?>">
                                <a href="javascript:;">
                                    <i class="<?=$value['class']?>" data-icon="<?=$value['icon']?>">
                                        <?=strpos($value['icon'], '&#') !== false? $value['icon'] : ''?>
                                    </i>
                                    <cite><?=$value['title']?></cite>
                                </a>
                            </dd>
                            <?php endforeach ?>
                        </dl>
                    </li>
                </ul>
                <ul class="layui-nav topLevelMenus" pc>
                    <?php foreach ($topNavs as $key => $value): ?>
                    <li class="layui-nav-item <?=$key==0 ? 'layui-this' : ''?>" data-menu="<?=$value['menu']?>">
                        <a href="javascript:;">
                            <i class="<?=$value['class']?>" data-icon="<?=$value['icon']?>">
                                <?=strpos($value['icon'], '&#') !== false? $value['icon'] : ''?>
                            </i>
                            <cite><?=$value['title']?></cite>
                        </a>
                    </li>
                    <?php endforeach ?>
                </ul>
                <?php endif ?>
                <!-- 顶部右侧菜单 -->
                <ul class="layui-nav top_menu">
                    <li class="layui-nav-item" pc>
                        <a href="javascript:;" class="clearCache"><i class="layui-icon" data-icon="&#xe640;">&#xe640;</i><cite>清除缓存</cite><span class="layui-badge-dot"></span></a>
                    </li>
<!-- 
                    <li class="layui-nav-item lockcms" pc>
                        <a href="javascript:;"><i class="seraph icon-lock"></i><cite>锁屏</cite></a>
                    </li>
                     -->
                    <li class="layui-nav-item" id="userInfo">
                        <a href="javascript:;"><img src="<?=$bundle->baseUrl.'/resources/images/myzero1.jpg'?>" class="layui-nav-img userAvatar" width="35" height="35"><cite class="adminName">myzero1</cite></a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="javascript:;" data-url="page/user/userInfo.html">
                                    <i class="seraph icon-ziliao" data-icon="icon-ziliao"></i>
                                    <cite>个人资料</cite>
                                </a>
                            </dd>
                            <dd>
                                <a href="javascript:;" data-url="page/user/changePwd.html">
                                    <i class="seraph icon-xiugai" data-icon="icon-xiugai"></i>
                                    <cite>修改密码</cite>
                                </a>
                            </dd>
                            <?php if ($bundle->noticeUrl): ?>
                            <dd>
                                <a href="javascript:;" class="showNotice">
                                    <i class="layui-icon">&#xe645;</i>
                                    <cite>系统公告</cite>
                                    <span class="layui-badge-dot"></span>
                                </a>
                            </dd>                            <?php endif ?>
                            <dd pc>
                                <a href="javascript:;" class="functionSetting">
                                    <i class="layui-icon">&#xe620;</i
                                        <cite>功能设定</cite>
                                        <span class="layui-badge-dot"></span>
                                    </a>
                                </dd>
                            <dd pc>
                                <a href="javascript:;" class="changeSkin">
                                    <i class="layui-icon">&#xe61b;</i>
                                    <cite>更换皮肤</cite>
                                </a>
                            </dd>
                            <dd>
                                <a href="javascript:$('#logout-form').submit();" class="signOut">
                                    <i class="seraph icon-tuichu"></i>
                                    <cite>退出</cite>
                                </a>
                            </dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>
        <!-- 左侧导航 -->
        <div class="layui-side layui-bg-black">
            <div class="navBar layui-side-scroll" id="navBar">
                <ul class="layui-nav layui-nav-tree">
                    <li class="layui-nav-item layui-this">
                        <a href="javascript:;" data-url="page/main.html"><i class="layui-icon" data-icon=""></i><cite>后台首页</cite></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- 右侧内容 -->
        <div class="layui-body layui-form" style="bottom: <?=$bundle->copyright ? 44 : 0?>px">
            <div class="layui-tab mag0" lay-filter="bodyTab" id="top_tabs_box">
                <ul class="layui-tab-title top_tab" id="top_tabs">
                    <li class="layui-this" lay-id="">
                        <i class="layui-icon">&#xe68e;</i>
                        <cite>后台首页</cite></li>
                </ul>
                <ul class="layui-nav closeBox">
                  <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon caozuo">&#xe643;</i> 页面操作</a>
                    <dl class="layui-nav-child">
                      <dd><a href="javascript:;" class="refresh refreshThis"><i class="layui-icon">&#xe669;</i> 刷新当前</a></dd>
                      <dd><a href="javascript:;" class="closePageOther"><i class="seraph icon-prohibit"></i> 关闭其他</a></dd>
                      <dd><a href="javascript:;" class="closePageAll"><i class="seraph icon-guanbi"></i> 关闭全部</a></dd>
                    </dl>
                  </li>
                </ul>
                <div class="layui-tab-content clildFrame">
                    <div class="layui-tab-item layui-show">
                        <iframe src="<?=$bundle->mainUrl?>"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- 底部 -->
        <?=$bundle->copyright ? sprintf('<div class="layui-footer footer">%s</div>', str_replace('LayoutAssetBundleBaseUrl', $bundle->baseUrl, $bundle->copyright) ) : '' ?>
    </div>

    <!-- 移动导航 -->
    <div class="site-tree-mobile"><i class="layui-icon">&#xe602;</i></div>
    <div class="site-mobile-shade"></div>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
