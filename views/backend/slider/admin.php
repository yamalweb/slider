<?php

use yii\helpers\Html;

use himiklab\sortablegrid\SortableGridView as GridView;

use kartik\icons\Icon;
use yii\widgets\Pjax;
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Слайды';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать блог', ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?php Pjax::begin();?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>['class'=>'table table-hover'],
        'summary' => '',
        'columns' => [
            [
                'label' => 'Изобр',
                'content' => function ($slider) {
                    return Html::img($slider->getThumbUploadUrl('pic', 'thumb'), ['class' => 'img-thumbnail']);
                },
            ],
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a(\yii\helpers\StringHelper::truncate($model->title, 70), ['/slider/slider/update', 'id' => $model->id]);
                },

            ],
            [
                'attribute' => 'create_datetime',
                'format' => ['datetime', 'php:d.m.Y']
            ],

            /*[
                'attribute' => 'is_public',
                'class' => '\kartik\grid\BooleanColumn',
                'trueLabel' => 'Да',
                'falseLabel' => 'Нет'
            ],*/
            [
                'attribute' => 'is_public',
                /*'value' => function ($model) {
                    return $model->is_public==1?"да":"нет";
                },*/
                'class'=>'\dixonstarter\togglecolumn\ToggleColumn',
                'linkTemplateOn'=>'<a class="toggle-column btn btn-primary btn-xs btn-block" data-pjax="0" href="{url}"><i  class="glyphicon glyphicon-ok"></i> {label}</a>',
                'linkTemplateOff'=>'<a class="toggle-column btn btn-default btn-xs btn-block" data-pjax="0" href="{url}"><i  class="glyphicon glyphicon-remove"></i> {label}</a>'
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}',
            ],
        ],
    ]); ?>
    <?php Pjax::end();?>
</div>
