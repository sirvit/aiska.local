<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Kassa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kassa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_kontrakt')->textInput() ?>

    <?= $form->field($model, 'kassa_n_doc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kassa_d_doc')->textInput() ?>

    <?= $form->field($model, 'kassa_d_summa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kassa_kz')->textInput() ?>

    <?= $form->field($model, 'kassa_ds')->textInput() ?>

    <?= $form->field($model, 'kassa_del')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
