<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FileCzSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="file-cz-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_file_cz') ?>

    <?= $form->field($model, 'id_proekt') ?>

    <?= $form->field($model, 'file_cz_content') ?>

    <?= $form->field($model, 'file_cz_name') ?>

    <?= $form->field($model, 'file_cz_kz') ?>

    <?php // echo $form->field($model, 'file_cz_ds') ?>

    <?php // echo $form->field($model, 'file_cz_del') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
