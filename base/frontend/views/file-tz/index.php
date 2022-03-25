<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\FileTzSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Файлы Тех. задания';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-tz-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить файл Тех. задания', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_file_tz',
            'id_kontrakt',
            'file_tz_content',
            'file_tz_name',
            'file_tz_kz',
            //'file_tz_ds',
            //'file_tz_del',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
