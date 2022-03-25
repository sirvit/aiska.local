<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Kassa */

$this->title = $model->id_kassa;
$this->params['breadcrumbs'][] = ['label' => 'Kassas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kassa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_kassa' => $model->id_kassa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_kassa' => $model->id_kassa], [
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
            'id_kassa',
            'id_kontrakt',
            'kassa_n_doc',
            'kassa_d_doc',
            'kassa_d_summa',
            'kassa_kz',
            'kassa_ds',
            'kassa_del',
        ],
    ]) ?>

</div>
