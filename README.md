yii2-theme-layui
========================
yii2-theme-layui,based on [BrotherMa/layuicms2.0](https://github.com/BrotherMa/layuicms2.0) and [yiisoft/yii2-gii](https://github.com/yiisoft/yii2-gii)


Show time
------------
![](https://github.com/myzero1/show-time/blob/master/yii2-theme-layui/screenshot/-101.png)
![](https://github.com/myzero1/show-time/blob/master/yii2-theme-layui/screenshot/-102.png)
![](https://github.com/myzero1/show-time/blob/master/yii2-theme-layui/screenshot/-103.png)
![](https://github.com/myzero1/show-time/blob/master/yii2-theme-layui/screenshot/-104.png)
![](https://github.com/myzero1/show-time/blob/master/yii2-theme-layui/screenshot/-105.png)
![](https://github.com/myzero1/show-time/blob/master/yii2-theme-layui/screenshot/-106.png)
![](https://github.com/myzero1/show-time/blob/master/yii2-theme-layui/screenshot/-107.png)
![](https://github.com/myzero1/show-time/blob/master/yii2-theme-layui/screenshot/-108.png)
![](https://github.com/myzero1/show-time/blob/master/yii2-theme-layui/screenshot/-109.png)
![](https://github.com/myzero1/show-time/blob/master/yii2-theme-layui/screenshot/-110.png)
![](https://github.com/myzero1/show-time/blob/master/yii2-theme-layui/screenshot/-111.png)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require-dev myzero1/yii2-theme-layui： *
```

or add

```
"myzero1/yii2-theme-layui": "*"
```

to the require-dev section of your `composer.json` file.


Setting
-----

Once the extension is installed, simply modify your application configuration as follows:

#### in main.php ####

```php
return [
    ......
    'components' => [
        ......
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/myzero1/yii2-theme-layui/src/views', // using the layui theme
                ],
            ],
        ],
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'forceCopy' => false,
            // 'linkAssets' => true,//link to assets,no cache.used in develop.
            'bundles'=> [
                'myzero1\layui\assets\php\components\LayoutAsset' => [
                    // 'copyright' => '<p><span>copyright @2018-2038 myzero1</span></p>', // false
                    // 'copyright' => false
                    'noticeUrl' => '/gii',
                    // 'noticeUrl' => false,
                ],
            ],
        ],
        ......
    ],
    ......
    'params' => [
        ......
		'navs' => [
		    "contentManagement" => [
		        'topMenu' => [
		            "menu" => "contentManagement",
		            "title" => "内容管理",
		            "icon" => "&#xe63c;",
		            "class" => "layui-icon",
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
		    ],
		],
        ......
    ],
    ......
    
];
```

#### in main-local.php ####

```php
......
if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1'],
        'generators' => [
            'z1layui_crud' => [ // generator name
                'class' => 'myzero1\layui\gii\templates\crud\Generator', // generator class
                'templates' => [
                    'default' => '@vendor/myzero1/yii2-theme-layui/src/gii/templates/crud/layui',
                ]
            ],
        ],
    ];
}
......
```


### setting in module ####
in the main.php of module

```php
return [
    ......
    'layout' => 'main',// to set theme by setting layout and layoutPath
    'layoutPath' => \Yii::getAlias('@vendor/myzero1/yii2-theme-layui/src/views/layouts'),
    ......
];
```



Usage
-----

You can then access home page to watch the theme.

```
http://localhost/path/to/index.php
```


You can then access gii page to watch the crud.

```
http://localhost/path/to/index.php?r=gii
OR
http://localhost/path/to/index.php/gii
```



#### select theme ####

* ` use layui `

    You show set the layout as layout in site Controller for index page,in ` SiteController  `  as flowlling, in view:

    ```
    public function actionIndex()
    {
        $this->layout = 'layout';
        return $this->render('index');
    }
    ```

    ![](https://github.com/myzero1/show-time/blob/master/yii2-theme-layui/screenshot/-102.png)




#### use plugins ####


* ` Add plug-ins to requirements `

    Just add code  as flowlling, in view:

    ```php

    <?php \myzero1\layui\assets\php\components\plugins\EchartsAsset::register($this); ?>

    ```

    ` Optional plug-in `

    ```php
    \myzero1\layui\assets\php\components\plugins\EchartsAsset::register($this);
    \myzero1\layui\assets\php\components\plugins\SwitchAsset::register($this);
    \myzero1\layui\assets\php\components\plugins\Wysihtml5Asset::register($this);
    \myzero1\layui\assets\php\components\plugins\ZtreeAsset::register($this);
    ```

* ` use echart `

    Just add code  as flowlling, in view:

    ```
    <?php myzero1\layui\assets\php\components\plugins\EchartsAsset::register($this); ?>

    <div data-provide="z1echarts" id='client-chart' style="width: 100%;height:250px;" data-echarts-config="{title: {text: '折线图基本',left: 'center'}}"></div>

    ```

    ![](https://github.com/myzero1/show-time/blob/master/yii2-theme-adminlteiframe/screenshot/101.png)


*  ` use wysihtml5 `

    Just add code  as flowlling, in view:

    ```
    <?php myzero1\layui\assets\php\components\plugins\Wysihtml5Asset::register($this); ?>

    <textarea data-provide="z1wysihtml5" data-z1wysihtml5-config="{}" rows="10" cols="80"></textarea>

    ```

    ![](https://github.com/myzero1/show-time/blob/master/yii2-theme-adminlteiframe/screenshot/401.png)

    You can also use the advanced wysiwyg tool, [yiidoc/yii2-redactor](https://github.com/yiidoc/yii2-redactor)
    If you want to upload a file,you can try this widget,[kartik-v/yii2-widget-fileinput](https://github.com/kartik-v/yii2-widget-fileinput)
    You can combine yiidoc/yii2-redactor and kartik-v/yii2-widget-fileinput together.

    ```
    <?php
    <?php
        echo $form->field($model, 'photo', [
            "template" => sprintf("{label}\n{input}%s\n{hint}\n{error}",
                \kartik\file\FileInput::widget([
                    'name' => 'file',
                    'pluginOptions' => [
                        'layoutTemplates' => 'progress',
                        'uploadUrl' => Url::to(['/redactor/upload/image']),
                        'showPreview' => false,
                        'showUpload' => false,
                        'initialCaption' => $model->photo,
                    ],
                    'pluginEvents' => [
                        'change' => '
                            function(event, data, previewId, index) {
                                if($("#z1fileinput-progress").length == 0){
                                    var mystyle = "<div id=z1fileinput-progress><style> \
                                        .kv-upload-progress .progress{height: 100%;margin: 0;position: absolute;z-index: 999;width: 40px;right: 80px;border: 1px solid #00a65a;}\
                                        .kv-upload-progress .progress-bar{height: 100%;line-height: 32px;}\
                                    </style></div>";
                                    $("body").append(mystyle);
                                }

                                $(this).fileinput("upload");
                            }
                        ',
                        'fileuploaded' => '
                            function(event, data, previewId, index) {
                                $(this).parents(".form-group").find("input[type=hidden].form-control").val(data.response.filelink);
                            }
                        ',
                    ],
                ])
            ),
        ])->hiddenInput()->label('照片');
    ?>
    ```

    ![](https://github.com/myzero1/show-time/blob/master/yii2-theme-adminlteiframe/screenshot/901.png)

*  ` use ztree `

    use ztree,in ul. You can set data-provide="z1ztree" to use it and set data-z1ztree-config='{...} to set it,you can set the primary parameter of ztree in data-z1ztree-config.  Just add code  as flowlling, in view:
    ```
    <ul id="mytes" data-provide="z1ztree" data-z1ztree-config='{data:[{ id:1, pId:0, name:"l1", open:true},{ id:2, pId:0, name:"l1", open:true},{ id:3, pId:1, name:"l2"}]}' class="ztree"></ul>

    ```
    ![](https://github.com/myzero1/show-time/blob/master/yii2-theme-adminlteiframe/screenshot/501.png)

    use ztree by default,in input.Just add code  as flowlling, in view:
    ```
    <?php echo $form->field($model, 'id')->textInput(['data-provide' =>"z1ztree"])?>

    ```
    ![](https://github.com/myzero1/show-time/blob/master/yii2-theme-adminlteiframe/screenshot/502.png)

    use ztree without parents,in input.Just add code  as flowlling, in view:
    ```
    <?php echo $form->field($model, 'id')->textInput(['data-provide' =>"z1ztree",'data-z1ztree-config' => '{"withParents": false}'])?>

    ```
    ![](https://github.com/myzero1/show-time/blob/master/yii2-theme-adminlteiframe/screenshot/503.png)

    use ztree by checkbox .Just add code  as flowlling, in view:
    ```
    <?php echo $form->field($model, 'id')->textInput(['data-provide' =>"z1ztree",'data-z1ztree-config' => '{"checkType": "checkbox"}'])?>

    ```
    ![](https://github.com/myzero1/show-time/blob/master/yii2-theme-adminlteiframe/screenshot/504.png)

*  ` use SwitchAsset `

    Just add code  as flowlling, in view:

    ```
    <?php myzero1\layui\assets\php\components\plugins\SwitchAsset::register($this); ?>

    <?= $form->field($model, 'rememberMe', [
        'labelOptions' => [
            'style' => '
                padding:0;
            ',
        ],
        'options' => [
            'style' => '
                width:400px;
            ',
        ],
    ])->checkbox([
        'id' => 'mywitch',
        'data-handle-width' => '105',
        'data-on-color' => 'primary',
        'data-on-text' => '要记住密码',
        'data-off-color' => 'info',
        'data-off-text' => '不记住密码',
        'data-label-text' => '要记住密码',
        'checked' => $model->rememberMe == '1' ? true : false,
    ])->label('') ?>

    ```

    ![](https://github.com/myzero1/show-time/blob/master/yii2-theme-layui/screenshot/-107.png)