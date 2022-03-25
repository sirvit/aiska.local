<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FileTz */

$this->title = 'Create File Tz';
$this->params['breadcrumbs'][] = ['label' => 'File Tzs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-tz-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
