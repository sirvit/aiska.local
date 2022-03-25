<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Kassa */

$this->title = 'Update Kassa: ' . $model->id_kassa;
$this->params['breadcrumbs'][] = ['label' => 'Kassas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kassa, 'url' => ['view', 'id_kassa' => $model->id_kassa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kassa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
