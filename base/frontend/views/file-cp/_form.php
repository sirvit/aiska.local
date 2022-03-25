<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\FileCp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="file-cp-form">

    <!--    --><?php //$form = ActiveForm::begin(); ?>
    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'id_proekt')->textInput(['readonly'=> true]) ?>

    <!--    --><?//= $form->field($model, 'file_kp_content')->textInput() ?>
    <?php
    // Usage with ActiveForm and model
    if ($model->id_file_cp=='') {
        echo $form->field($model, 'file')->widget(FileInput::classname(), [
            'options' => [
                //'accept' => 'image/*',
                'multiple' => true,
            ],
            'pluginOptions' => [
                'language' => 'ru',
                'maxFileCount' => 10,
            ],
        ]);
    }
    ?>
    <?= $form->field($model, 'file_cp_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_cp_kz')->textInput() ?>

    <?= $form->field($model, 'file_cp_ds')->textInput() ?>
    <?php $model->file_cp_del=0; ?>
    <?= $form->field($model, 'file_cp_del')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
