<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FileTzSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="file-tz-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_file_tz') ?>

    <?= $form->field($model, 'id_kontrakt') ?>

    <?= $form->field($model, 'file_tz_content') ?>

    <?= $form->field($model, 'file_tz_name') ?>

    <?= $form->field($model, 'file_tz_kz') ?>

    <?php // echo $form->field($model, 'file_tz_ds') ?>

    <?php // echo $form->field($model, 'file_tz_del') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
