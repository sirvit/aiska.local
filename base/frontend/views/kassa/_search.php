<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\KassaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kassa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_kassa') ?>

    <?= $form->field($model, 'id_kontrakt') ?>

    <?= $form->field($model, 'kassa_n_doc') ?>

    <?= $form->field($model, 'kassa_d_doc') ?>

    <?= $form->field($model, 'kassa_d_summa') ?>

    <?php // echo $form->field($model, 'kassa_kz') ?>

    <?php // echo $form->field($model, 'kassa_ds') ?>

    <?php // echo $form->field($model, 'kassa_del') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
