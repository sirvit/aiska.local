<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FileTz */

$this->title = 'Update File Tz: ' . $model->id_file_tz;
$this->params['breadcrumbs'][] = ['label' => 'File Tzs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_file_tz, 'url' => ['view', 'id_file_tz' => $model->id_file_tz]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="file-tz-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
