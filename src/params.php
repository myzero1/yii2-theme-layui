<?php
$moduleId = \Yii::$app->params['z1layui']['moduleId'];

return [
    'layuiTheme' => [
        'navs' => [
            "businessManagement" => [
                'topMenu' => [
                    "menu" => "businessManagement",
                    "title" => "业务管理",
                    "icon" => "&#xe653;",
                    "class" => "layui-icon",
                ],
                [
                    "title" => "业务介绍",
                    "icon" => "icon-text",
                    "href" => "/$moduleId/business/introduction",
                    "spread" => false
                ],
                [
                    "title" => "CRUD操作",
                    "icon" => "icon-xiugai",
                    "href" => "",
                    "spread" => false,
                    "children" => [
                        [
                            "title" => "操作初始化",
                            "icon" => "z1iconfont z1icon-init",
                            "href" => "/$moduleId/user/init",
                            "spread" => false
                        ],
                        [
                            "title" => "列表页面",
                            "icon" => "&#xe60a;",
                            "href" => "/$moduleId/z1-user/index",
                            "spread" => false
                        ],
                    ]
                ],
                [
                    "title" => "使用文档",
                    "icon" => "&#xe705;",
                    "href" => "",
                    "spread" => false,
                    "children" => [
                        [
                            "title" => "字体图标",
                            "icon" => "icon-mokuai",
                            "href" => "/$moduleId/doc/icons",
                            "spread" => false
                        ],
                        [
                            "title" => "三级联动",
                            "icon" => "icon-mokuai",
                            "href" => "/$moduleId/doc/address",
                            "spread" => false
                        ],
                        [
                            "title" => "bodyTab",
                            "icon" => "icon-mokuai",
                            "href" => "/$moduleId/doc/bodytab",
                            "spread" => false
                        ],
                        [
                            "title" => "三级菜单",
                            "icon" => "icon-mokuai",
                            "href" => "/$moduleId/doc/nav",
                            "spread" => false
                        ],
                    ]
                ],
            ],
            "memberCenter" => [
                'topMenu' => [
                    "menu" => "memberCenter",
                    "title" => "用户中心",
                    "icon" => "icon-icon10",
                    "class" => "seraph icon-icon10",
                ],
                [
                    "title" => "用户管理",
                    "icon" => "&#xe66f;",
                    "href" => "/$moduleId/z1-user/index",
                    "spread" => false
                ],
                [
                    "title" => "角色管理",
                    "icon" => "&#xe770;",
                    "href" => "/$moduleId/user/role",
                    "spread" => false
                ]
            ],
            "systemeManagement" => [
                'topMenu' => [
                    "menu" => "systemeManagement",
                    "title" => "系统管理",
                    "icon" => "z1iconfont z1icon-set",
                    "class" => "z1iconfont z1icon-set",
                ],
                // 'topMenu' => [
                //     "menu" => "systemeManagement",
                //     "title" => "系统管理",
                //     "icon" => "&#xe620;",
                //     "class" => "layui-icon",
                // ],
                [
                    "title" => "平台公告",
                    "icon" => "&#xe638;",
                    "href" => "/$moduleId/site/notice",
                    "spread" => false
                ],
                [
                    "title" => "403页面",
                    "icon" => "&#xe638;",
                    "href" => "/$moduleId/site/e403",
                    "spread" => false
                ],
                [
                    "title" => "404页面",
                    "icon" => "&#xe638;",
                    "href" => "/$moduleId/site/e404",
                    "spread" => false
                ],
                [
                    "title" => "500页面",
                    "icon" => "&#xe638;",
                    "href" => "/$moduleId/site/e500",
                    "spread" => false
                ],
                [
                    "title" => "登录页面",
                    "icon" => "&#xe638;",
                    "href" => "/$moduleId/site/login",
                    "spread" => false,
                    "target"=> "_blank",
                ],
            ],
        ],
        'rightNavs' => [
            [
                "title" => "个人资料",
                "icon" => "seraph icon-ziliao",
                "href" => "/page/user/userInfo.html",
                "spread" => false
            ],
            [
                "title" => "修改密码",
                "icon" => "seraph icon-xiugai",
                "href" => "page/user/changePwd.html",
                "spread" => false
            ],
        ],
        'addLayoutAssets' => function(){
            // backend\assets\AppAsset::register(\Yii::$app->view);
        },
        'addMainAssests' => function(){
            // backend\assets\AppAsset::register(\Yii::$app->view);
        },
        // 'mainUrl' => '/site/main', // default z1site/site/main
        // 'noticeUrl' => false, // defult z1site/site/notice
        // 'funcSettting' => false, // default true
        // 'skin' => false, // default true
        // 'copyright' => false,// default '<p><span>copyright @2018-2028 myzero1</span><a href="https://github.com/myzero1/yii2-theme-layui" target="_blank"><img class="layui-nav-img userAvatar" src="LayoutAssetBundleBaseUrl/resources/images/myzero1.jpg" style="margin-left:10px;cursor:pointer;"></a></p>'
    ],
];