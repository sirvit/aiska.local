<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FileCz */

$this->title = 'Изменить файл: "' . $model->file_cz_name.' "';
$this->params['breadcrumbs'][] = ['label' => 'Файлы Чертежи завода', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_file_cz, 'url' => ['view', 'id' => $model->id_file_cz]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="file-cz-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
