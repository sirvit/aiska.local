<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Priem */

$this->title = 'Update Priem: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Priems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'priem_id' => $model->priem_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="priem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
