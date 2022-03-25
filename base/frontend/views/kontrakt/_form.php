<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Kontrakt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kontrakt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_proekt')->textInput() ?>

    <?= $form->field($model, 'k_summa')->textInput() ?>

    <?= $form->field($model, 'k_valuta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'k_spec')->textInput() ?>

    <?= $form->field($model, 'k_zn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'k_d_okon')->textInput() ?>

    <?= $form->field($model, 'k_d_post')->textInput() ?>

    <?= $form->field($model, 'k_d_pp')->textInput() ?>

    <?= $form->field($model, 'k_oplata')->textInput() ?>

    <?= $form->field($model, 'k_kz')->textInput() ?>

    <?= $form->field($model, 'k_ds')->textInput() ?>

    <?= $form->field($model, 'k_del')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
