<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Street */

$this->title = 'Update Street: ' . $model->s_id;
$this->params['breadcrumbs'][] = ['label' => 'Streets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->s_id, 'url' => ['view', 's_id' => $model->s_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="street-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
