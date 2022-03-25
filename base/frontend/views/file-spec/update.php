<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FileSpec */

$this->title = 'Update File Spec: ' . $model->id_file_spec;
$this->params['breadcrumbs'][] = ['label' => 'File Specs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_file_spec, 'url' => ['view', 'id_file_spec' => $model->id_file_spec]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="file-spec-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
