<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FileCp */

$this->title = 'Изменить файл: "' . $model->file_cp_name.' "';
$this->params['breadcrumbs'][] = ['label' => 'Файлы Чертежей проекта', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_file_cp, 'url' => ['view', 'id' => $model->id_file_cp]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="file-cp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
