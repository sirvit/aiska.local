<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FileKp */

$this->title = 'Изменить файл: "' . $model->file_kp_name.' "';
$this->params['breadcrumbs'][] = ['label' => 'Файлы Коммерческое предложение', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_file_kp, 'url' => ['view', 'id' => $model->id_file_kp]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="file-kp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
