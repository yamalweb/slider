<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model yamalweb\galaxycmsblog\models\Blog */

$this->title = 'Редактирование страницы Блога: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Страницы Блога', 'url' => ['admin']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="page-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
