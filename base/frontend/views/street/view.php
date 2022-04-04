<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Street */

$this->title = $model->s_id;
$this->params['breadcrumbs'][] = ['label' => 'Streets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="street-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 's_id' => $model->s_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 's_id' => $model->s_id], [
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
            's_id',
            's_name',
            's_path',
        ],
    ]) ?>

</div>
