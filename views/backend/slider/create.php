<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model yamalweb\galaxycmsblog\models\Blog */

$this->title = 'Создать Слайд';
$this->params['breadcrumbs'][] = ['label' => 'Слайды', 'url' => ['admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
