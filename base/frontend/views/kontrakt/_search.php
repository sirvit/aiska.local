<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\KontraktSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kontrakt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_kontrakt') ?>

    <?= $form->field($model, 'id_proekt') ?>

    <?= $form->field($model, 'k_summa') ?>

    <?= $form->field($model, 'k_valuta') ?>

    <?= $form->field($model, 'k_spec') ?>

    <?php // echo $form->field($model, 'k_zn') ?>

    <?php // echo $form->field($model, 'k_d_okon') ?>

    <?php // echo $form->field($model, 'k_d_post') ?>

    <?php // echo $form->field($model, 'k_d_pp') ?>

    <?php // echo $form->field($model, 'k_oplata') ?>

    <?php // echo $form->field($model, 'k_kz') ?>

    <?php // echo $form->field($model, 'k_ds') ?>

    <?php // echo $form->field($model, 'k_del') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
