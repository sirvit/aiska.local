<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FileKp */

$this->title = 'Добавить файлы КП';
$this->params['breadcrumbs'][] = ['label' => 'Файлы КП', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-kp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
