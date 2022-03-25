<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FileTz */

$this->title = $model->id_file_tz;
$this->params['breadcrumbs'][] = ['label' => 'File Tzs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="file-tz-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_file_tz' => $model->id_file_tz], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_file_tz' => $model->id_file_tz], [
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
            'id_file_tz',
            'id_kontrakt',
            'file_tz_content',
            'file_tz_name',
            'file_tz_kz',
            'file_tz_ds',
            'file_tz_del',
        ],
    ]) ?>

</div>
