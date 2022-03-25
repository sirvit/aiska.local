<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FileCz */

$this->title = 'Добавить файлы ЧЗ';
$this->params['breadcrumbs'][] = ['label' => 'Файлы ЧЗ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-cz-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
