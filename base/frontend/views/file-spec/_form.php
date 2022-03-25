<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FileSpec */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="file-spec-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_kontrakt')->textInput() ?>

    <?= $form->field($model, 'file_spec_content')->textInput() ?>

    <?= $form->field($model, 'file_spec_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_spec_kz')->textInput() ?>

    <?= $form->field($model, 'file_spec_ds')->textInput() ?>

    <?= $form->field($model, 'file_spec_del')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
