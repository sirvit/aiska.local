<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FileKpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="file-kp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_file_kp') ?>

    <?= $form->field($model, 'id_proekt') ?>

    <?= $form->field($model, 'file_kp_content') ?>

    <?= $form->field($model, 'file_kp_name') ?>

    <?= $form->field($model, 'file_kp_kz') ?>

    <?php // echo $form->field($model, 'file_kp_ds') ?>

    <?php // echo $form->field($model, 'file_kp_del') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
