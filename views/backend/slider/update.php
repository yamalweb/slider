<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model yamalweb\galaxycmsblog\models\Blog */

$this->title = 'Редактирование Слайда: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Слайды', 'url' => ['admin']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="page-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
