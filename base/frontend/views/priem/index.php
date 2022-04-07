<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Priem;
use common\models\City;
use common\models\Street;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PriemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Priems';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="priem-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Priem', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'priem_id',
            'nomer',
            'data_pz',
            //'gorod',
            [
                'attribute'=>'gorod',
                'filter'=> City::find()->select(['c_name','c_id'])->indexBy('c_id')->column(),
                'value' => 'city.c_name',
            ],
            //'ulica',
            [
                'attribute'=>'ulica',
                'filter'=> Street::find()->select(['s_name','s_id'])->indexBy('s_id')->column(),
                'value' => 'street.s_name',
            ],
            //'d_u',
            //'dom',
            //'kvartira',
            //'tel',
            //'family',
            //'name',
            //'otch',
            //'doc1',
            //'doc2',
            //'doc3',
            //'vidr',
            //'koef',
            //'avans',
            //'avans_date',
            //'obsl_date',
            //'summa',
            //'date_v',
            //'summa_date',
            //'date_pol',
            //'technik',
            //'invent_tip',
            //'vnes_izm',
            //'kto_prz',
            //'data_kvz',
            //'summa_techn',
            //'date_koef',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Priem $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'priem_id' => $model->priem_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
