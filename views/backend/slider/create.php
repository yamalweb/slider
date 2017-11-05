<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model yamalweb\galaxycmsblog\models\Blog */

$this->title = 'Создать страницу Блога';
$this->params['breadcrumbs'][] = ['label' => 'Страницы Блога', 'url' => ['admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
