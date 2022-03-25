<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Kontrakt */

$this->title = $model->id_kontrakt;
$this->params['breadcrumbs'][] = ['label' => 'Kontrakts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kontrakt-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_kontrakt' => $model->id_kontrakt], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_kontrakt' => $model->id_kontrakt], [
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
            'id_kontrakt',
            'id_proekt',
            'k_summa',
            'k_valuta',
            'k_spec',
            'k_zn:ntext',
            'k_d_okon',
            'k_d_post',
            'k_d_pp',
            'k_oplata',
            'k_kz',
            'k_ds',
            'k_del',
        ],
    ]) ?>

</div>
