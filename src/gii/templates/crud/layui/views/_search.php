<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

// myzero1\adminlteiframe\assets\php\components\plugins\DataRangePickerAsset::register($this);

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->searchModelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<blockquote class="blockquote-search layui-elem-quote <?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-search">

    <?= "<?php\n" ?>
        $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            'id'=> 'layer-form-' . $this->context->action->id,
            'options' => [
                'class' => 'layui-form layui-form-pane layui-form-action',
            ],
            'fieldConfig' => [
                'options' => ['class' => 'layui-form-item form-group'],
                'template' => "{label}\n<div class='layui-input-block'>{input}</div>\n{hint}",
                'labelOptions' => [
                    'class' => 'layui-form-label',
                ],
                'inputOptions' => [
                    'class' => 'layui-input',
                ],
                'hintOptions' => [
                    'class' => 'hint-block',
                ],
            ]
        ])
    ?>

    <?= "<?php // echo " ?>$form->field($model, 'id')->textInput(['data-provide' =>"z1datarangepicker",'data-z1datarangepicker-config' => '{singleDatePicker: false}'])?>

<?php
$count = 0;
foreach ($generator->getColumnNames() as $attribute) {
    if (++$count < 6) {
        echo "    <?= " . $generator->generateActiveSearchField($attribute) . " ?>\n\n";
    } else {
        echo "    <?php // echo " . $generator->generateActiveSearchField($attribute) . " ?>\n\n";
    }
}
?>
    <div class="layui-form-item form-group layui-form-item-actions">
        <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('搜索') ?>, ['class' => 'layui-btn layui-btn-search']) ?>

        <?= "<?= " ?>Html::a('添加', '#', [
            'class' => 'layui-btn layui-btn-normal use-layer',
            'layer-config' => sprintf('{type:2,title:"%s",content:"%s",shadeClose:false,area:["100%%","100%%"],backtip:"点击此处返回文章列表"}', '添加', Url::to(['create'])) ,
        ]); ?>

        <?= "<?= " ?>Html::a('批量删除', '#', [
                'id'=>'delete-selected',
                'url'=>Url::to(['delete-selected','z1selected' => '']),
                'class'=>'layui-btn layui-btn-danger use-layer',
                'layer-config' => sprintf('{icon:3,area:["auto","auto"],type:0,title:"%s",content:"%s",shadeClose:false,btn:["确定","取消"],yes:function(index,layero){var url=$("#delete-selected").attr("url");$.post(url, {}, function(str){$(layero).find(".layui-layer-content").html(str);});},btn2:function(index, layero){layer.close(index);}}', '批量删除', '一旦删除，无法恢复，是否删除选定的数据？') 
            ]); ?>

    </div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</blockquote>