<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

$baseModelName = StringHelper::basename($generator->modelClass);
$wordsModelName = Inflector::camel2words($baseModelName);
$idModelName =  Inflector::camel2id($baseModelName);
$title = $generator->generateString(Inflector::pluralize($wordsModelName));

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

myzero1\layui\assets\php\components\plugins\LayTableAsset::register($this);

$this->title = <?= $title ?>;
$this->params['breadcrumbs'][] = $this->title;

<?= !empty($generator->searchModelClass) ? "\$columns = [\n" : "'columns' => [\n"; ?>
    'checkbox_column' => [
        'headerOptions' => [
            'lay-data'=>"{type:'checkbox',fixed:'left',width:50}",
        ],
        'attribute' => 'id',
    ],
    /*'scerial_column' => [
        'headerOptions' => [
            'lay-data'=>"{field:'SerialColumn'}"
        ],
        'class' => 'yii\grid\SerialColumn',
    ],*/
    <?php
    $count = 0;
    if (($tableSchema = $generator->getTableSchema()) === false) {
        foreach ($generator->getColumnNames() as $name) {
            if (++$count < 6) {
                echo "    '" . $name . "',\n";
            } else {
                echo "    // '" . $name . "',\n";
            }
        }
    } else {
        foreach ($tableSchema->columns as $column) {
            $format = $generator->generateColumnFormat($column);
            $name = $column->name;
            if (++$count < 6) {
                // echo "    '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                echo <<<OEF
    '$name' => [
        'headerOptions' => [
            'lay-data'=>"{field:'$name',sort:true}"
        ],
        'attribute' => '$name',
    ],\n
OEF;
            } else {
                // echo "    // '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                echo <<<OEF
/*    '$name' => [
        'headerOptions' => [
            'lay-data'=>"{field:'$name', sort: true}"
        ],
        'attribute' => '$name',
    ],*/\n
OEF;
            }
        }
    }
    ?>
    [
        'headerOptions' => [
            'lay-data'=>"{field:'operation','unresize':true,fixed:'right',width:200}"
        ],
        'header' => '操作',
        'class' => 'yii\grid\ActionColumn',
        'template' => '{update}{delete}{view}',
        'buttons' => [
            'view' => function ($url, $model, $key) {
                $options = array_merge([
                    'class'=>'layui-btn layui-btn-xs layui-btn-primary use-layer',
                    'layer-config' => sprintf('{type:2,title:"%s",content:"%s",shadeClose:false,area:["100%%","100%%"],backtip:"点击此处返回文章列表"}', Yii::t('yii', 'View'), $url) ,
                ]);
                return Html::a(Yii::t('yii', 'View'), '#', $options);
            },
            'update' => function ($url, $model, $key) {
                $options = array_merge([
                    'class'=>'layui-btn layui-btn-xs use-layer',
                    'layer-config' => sprintf('{type:2,title:"%s",content:"%s",shadeClose:false,area:["100%%","100%%"],backtip:"点击此处返回文章列表"}', Yii::t('yii', 'Update'), $url) ,
                ]);
                return Html::a(Yii::t('yii', 'Update'), '#', $options);
            },
            'delete' => function ($url, $model, $key) {
                $options = array_merge([
                    'class'=>'layui-btn layui-btn-xs layui-btn-danger use-layer',
                    'layer-config' => sprintf('{icon:3,area:["auto","auto"],type:0,title:"%s",content:"%s",shadeClose:false,btn:["确定","取消"],yes:function(index,layero){$.post("%s", {}, function(str){$(layero).find(".layui-layer-content").html(str);});},btn2:function(index, layero){layer.close(index);}}', Yii::t('yii', 'Delete'), '一旦删除，不能找回，你确定删除吗？',$url) ,
                ]);
                return Html::a(Yii::t('yii', 'Delete'), '#', $options);
            }
        ],
    ],
];

$initSort = [];
if (Yii::$app->request->get('sort')) {
    $sort = Yii::$app->request->get('sort');

    $initSort['field'] = trim($sort,'-');
    if ($sort[0] === '-') {
        $initSort['type'] = 'desc';
    } else {
        $initSort['type'] = 'asc';
    }
} else if ($dataProvider->sort->defaultOrder) {

    $defaultOrder = $dataProvider->sort->defaultOrder;
    $first_val = reset($defaultOrder);
    $first_key = key($defaultOrder);

    $initSort['field'] = $first_key;
    if ($first_val === 3) {
        $initSort['type'] = 'desc';
    } else {
        $initSort['type'] = 'asc';
    }
}

$initSortStr = count($initSort) ? json_encode($initSort) : '';

if (Yii::$app->request->get('per-page')) {
    $limit = Yii::$app->request->get('per-page');
} else {
    $limit = $dataProvider->pagination->pageSize;
}

$curr = Yii::$app->request->get('page') ? Yii::$app->request->get('page') : 1;
$count = $dataProvider->getTotalCount();

?>
<div class="<?= $idModelName ?>-index">

<!--     <h1><?= "<?= " ?>Html::encode($this->title) ?></h1> -->

<?php if(!empty($generator->searchModelClass)): ?>
<?= "    <?php " . ($generator->indexWidgetType === 'grid' ? " " : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
<?php endif; ?>

<?php if ($generator->indexWidgetType === 'grid'): ?>
    <?= "<?= " ?>GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => $columns,
        'options' => [
            'class' => 'adminlteiframe-gridview',
        ],
        'tableOptions' => [
            'class' => 'gridview-table gridview-table-list table table-bordered table-hover dataTable layui-hide ',
            'lay-filter'=>'z1gridview-laytable',
            'id' => 'z1gridview-laytable',
            'limit' => $limit,
            'curr' => $curr,
            'initSortStr' => $initSortStr,
            'count' => $count,
            'subSelectors' => '[".layui-form-action"]',
            'subHeight' => 60,
            'laytableopts' => '{"page":true}',
        ],
        'layout'=> '{items}',
    ]); ?>
<?php else: ?>
    <?= "<?= " ?>ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
        },
    ]) ?>
<?php endif; ?>

</div>
