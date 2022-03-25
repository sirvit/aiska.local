<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProektSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proekt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_proekt') ?>

    <?= $form->field($model, 'p_nazvanie') ?>

    <?= $form->field($model, 'p_zapros') ?>

    <?= $form->field($model, 'p_komer') ?>

    <?= $form->field($model, 'p_cproekt') ?>

    <?php // echo $form->field($model, 'p_czavod') ?>

    <?php // echo $form->field($model, 'p_pzakaz') ?>

    <?php // echo $form->field($model, 'p_pispolnitel') ?>

    <?php // echo $form->field($model, 'p_kz') ?>

    <?php // echo $form->field($model, 'p_dz') ?>

    <?php // echo $form->field($model, 'p_del') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
