<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;

myzero1\layui\assets\php\components\plugins\LayFormAsset::register($this);

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">

    <?= "<?php" ?>
    $form = ActiveForm::begin([
        'id'=> 'layer-form-' . $this->context->action->id,
        'options' => [
            'class' => 'adminlteiframe-form layui-form layui-form-pane layui-form-hr'
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
    ]) ?>

<?php foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) {
        echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
    }
} ?>
    <div class="form-group  layui-right form-acitons">
        <?= "<?= " ?>Html::submitButton($model->isNewRecord ? <?= $generator->generateString('Create') ?> : <?= $generator->generateString('Update') ?>, ['class' => $model->isNewRecord ? 'layui-btn' : 'layui-btn layui-btn-normal']) ?>
    </div>

    <?= "<?php" ?> ActiveForm::end() ?>

</div>
