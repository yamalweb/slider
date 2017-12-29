<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use dosamigos\datepicker\DatePicker;
use yii\helpers\Url;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\modules\page\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-8">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($model, 'is_public')
                    ->checkbox(['label' => 'Опубликовать']) ?>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Original image -->
                            <?= Html::img($model->getUploadUrl('pic'), ['class' => 'img-thumbnail']) ?>
                        </div>
                        <div class="col-lg-4">
                            <!-- Thumb 1 (thumb profile) -->
                            <?= Html::img($model->getThumbUploadUrl('pic'), ['class' => 'img-thumbnail']) ?>
                        </div>
                        <div class="col-lg-2">
                            <!-- Thumb 2 (preview profile) -->
                            <?= Html::img($model->getThumbUploadUrl('pic', 'preview'), ['class' => 'img-thumbnail']) ?>
                        </div>
                    </div>
                </div>
                <?= $form->field($model, 'pic')->fileInput(['accept' => 'image/*']) ?>
            </div>


        </div>


        <div class="row">
            <div class="col-lg-12">
                <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
