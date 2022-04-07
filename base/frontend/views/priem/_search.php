<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PriemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="priem-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'priem_id') ?>

    <?= $form->field($model, 'nomer') ?>

    <?= $form->field($model, 'data_pz') ?>

    <?= $form->field($model, 'gorod') ?>

    <?= $form->field($model, 'ulica') ?>

    <?php // echo $form->field($model, 'd_u') ?>

    <?php // echo $form->field($model, 'dom') ?>

    <?php // echo $form->field($model, 'kvartira') ?>

    <?php // echo $form->field($model, 'tel') ?>

    <?php // echo $form->field($model, 'family') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'otch') ?>

    <?php // echo $form->field($model, 'doc1') ?>

    <?php // echo $form->field($model, 'doc2') ?>

    <?php // echo $form->field($model, 'doc3') ?>

    <?php // echo $form->field($model, 'vidr') ?>

    <?php // echo $form->field($model, 'koef') ?>

    <?php // echo $form->field($model, 'avans') ?>

    <?php // echo $form->field($model, 'avans_date') ?>

    <?php // echo $form->field($model, 'obsl_date') ?>

    <?php // echo $form->field($model, 'summa') ?>

    <?php // echo $form->field($model, 'date_v') ?>

    <?php // echo $form->field($model, 'summa_date') ?>

    <?php // echo $form->field($model, 'date_pol') ?>

    <?php // echo $form->field($model, 'technik') ?>

    <?php // echo $form->field($model, 'invent_tip') ?>

    <?php // echo $form->field($model, 'vnes_izm') ?>

    <?php // echo $form->field($model, 'kto_prz') ?>

    <?php // echo $form->field($model, 'data_kvz') ?>

    <?php // echo $form->field($model, 'summa_techn') ?>

    <?php // echo $form->field($model, 'date_koef') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
