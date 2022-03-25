<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Kontrakt */

$this->title = 'Update Kontrakt: ' . $model->id_kontrakt;
$this->params['breadcrumbs'][] = ['label' => 'Kontrakts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kontrakt, 'url' => ['view', 'id_kontrakt' => $model->id_kontrakt]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kontrakt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
