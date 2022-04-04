<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Street;
/* @var $this yii\web\View */
/* @var $searchModel common\models\StreetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Streets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="street-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Street', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            's_id',
            's_name',
            's_path',
//work one
//            ['class' => 'yii\grid\ActionColumn'],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Street $model, $key, $index, $column) {
                    return Url::toRoute([$action, 's_id' => $model->s_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
