<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Priem */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Priems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="priem-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'priem_id' => $model->priem_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'priem_id' => $model->priem_id], [
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
            'priem_id',
            'nomer',
            'data_pz',
            'gorod',
            'ulica',
            'd_u',
            'dom',
            'kvartira',
            'tel',
            'family',
            'name',
            'otch',
            'doc1',
            'doc2',
            'doc3',
            'vidr',
            'koef',
            'avans',
            'avans_date',
            'obsl_date',
            'summa',
            'date_v',
            'summa_date',
            'date_pol',
            'technik',
            'invent_tip',
            'vnes_izm',
            'kto_prz',
            'data_kvz',
            'summa_techn',
            'date_koef',
        ],
    ]) ?>

</div>
