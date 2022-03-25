<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Proekt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proekt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'p_nazvanie')->textarea(['rows' => 2]) ?>

<!--    --><?//= $form->field($model, 'p_zapros')->textInput(['type'=> 'date']) ?>
<!--    --><?//= $form->field($model, 'p_zapros')->textInput() ?>
    <?php echo $form->field($model, 'p_zapros')->widget(DatePicker::className(),
        [
            'language'=> 'ru',
            'name' => 'dp_1',
            'type' => DatePicker::TYPE_INPUT,
            'options' => ['placeholder' => 'Ввод даты/времени...'],
            'convertFormat' => true,
            'value'=> date("d.m.Y",(integer) $model->p_zapros),
            'pluginOptions' => [
                                'format' => 'dd-MM-yyyy',
                                'autoclose'=>true,
                                'todayBtn'=>false, //снизу кнопка "сегодня"
                                ]
        ]);
    ?>

    <?= $form->field($model, 'p_komer')->textarea(['rows' => 4]) ?>


<!--    --><?//= $form->field($model, 'p_cproekt')->textInput() ?>

<!--    --><?//= $form->field($model, 'p_czavod')->textInput() ?>

    <?= $form->field($model, 'p_pzakaz')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'p_pispolnitel')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'p_kz')->textInput()->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'p_dz')->textInput()->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'p_del')->textInput()->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
