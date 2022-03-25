<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FileSpec */

$this->title = $model->id_file_spec;
$this->params['breadcrumbs'][] = ['label' => 'File Specs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="file-spec-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_file_spec' => $model->id_file_spec], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_file_spec' => $model->id_file_spec], [
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
            'id_file_spec',
            'id_kontrakt',
            'file_spec_content',
            'file_spec_name',
            'file_spec_kz',
            'file_spec_ds',
            'file_spec_del',
        ],
    ]) ?>

</div>
