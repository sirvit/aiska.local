<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FileCz */

$this->title = $model->id_file_cz;
$this->params['breadcrumbs'][] = ['label' => 'Файлы Чертежи завода', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="file-cz-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id_file_cz], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_file_cz], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_file_cz',
            'id_proekt',
            'file_cz_content',
            'file_cz_name',
            'file_cz_kz',
            'file_cz_ds',
            //'file_cz_del',
        ],
    ]) ?>

</div>
