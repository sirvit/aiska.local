<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FileSpecSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="file-spec-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_file_spec') ?>

    <?= $form->field($model, 'id_kontrakt') ?>

    <?= $form->field($model, 'file_spec_content') ?>

    <?= $form->field($model, 'file_spec_name') ?>

    <?= $form->field($model, 'file_spec_kz') ?>

    <?php // echo $form->field($model, 'file_spec_ds') ?>

    <?php // echo $form->field($model, 'file_spec_del') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
