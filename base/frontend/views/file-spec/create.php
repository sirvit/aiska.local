<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FileSpec */

$this->title = 'Create File Spec';
$this->params['breadcrumbs'][] = ['label' => 'File Specs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-spec-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
