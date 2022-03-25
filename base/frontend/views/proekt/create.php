<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Proekt */

$this->title = 'Добавить Проект';
$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proekt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <h3>Файлы можно добавить только после сохранения проекта</h3>
</div>
