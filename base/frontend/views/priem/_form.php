<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Priem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="priem-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_pz')->textInput() ?>

    <?= $form->field($model, 'gorod')->textInput() ?>

    <?= $form->field($model, 'ulica')->textInput() ?>

    <?= $form->field($model, 'd_u')->textInput() ?>

    <?= $form->field($model, 'dom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kvartira')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'family')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otch')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc1')->textInput() ?>

    <?= $form->field($model, 'doc2')->textInput() ?>

    <?= $form->field($model, 'doc3')->textInput() ?>

    <?= $form->field($model, 'vidr')->textInput() ?>

    <?= $form->field($model, 'koef')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'avans')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'avans_date')->textInput() ?>

    <?= $form->field($model, 'obsl_date')->textInput() ?>

    <?= $form->field($model, 'summa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_v')->textInput() ?>

    <?= $form->field($model, 'summa_date')->textInput() ?>

    <?= $form->field($model, 'date_pol')->textInput() ?>

    <?= $form->field($model, 'technik')->textInput() ?>

    <?= $form->field($model, 'invent_tip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vnes_izm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kto_prz')->textInput() ?>

    <?= $form->field($model, 'data_kvz')->textInput() ?>

    <?= $form->field($model, 'summa_techn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_koef')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
