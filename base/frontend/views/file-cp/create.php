<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FileCp */

$this->title = 'Добавить файлы ЧП';
$this->params['breadcrumbs'][] = ['label' => 'Файлы ЧП', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-cp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
