<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\KassaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Кассовые документы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kassa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать кассовый документ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_kassa',
            'id_kontrakt',
            'kassa_n_doc',
            'kassa_d_doc',
            'kassa_d_summa',
            //'kassa_kz',
            //'kassa_ds',
            //'kassa_del',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
