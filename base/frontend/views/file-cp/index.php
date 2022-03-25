<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\User;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\FileCpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Файлы Чертежей проекта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-cp-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить файл чертежи проекта', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id_file_cp',
            //'id_proekt',
            //'file_cp_content',
            [
                'attribute'=>'Файл',
                'format'=> 'html',
                'value'=> function($data){
                    $dir = Yii::getAlias('@web/public_html/uploads/images').'/cp/';
                    $result = Html::a($data->file_cp_name, Url::to($dir.$data->file_cp_content,true));
                    return $result;

                }

            ],

            //'file_cp_name',
            //'file_cp_kz',
            [
                'attribute' =>'Кто завел',
//                'format'=> 'html',
                'contentOptions' => ['style'=>'vertical-align: middle; text-align: center;'],
                'value' => function($row){
                    $res =User::findOne(['id'=>$row->file_cp_kz]);
                    if ($res) { return $res->username;} else return 'неизвестно';
                }

            ],
            [
                'attribute' =>'file_cp_ds',
                'value' => function($model){
                    $tt=preg_replace('#(\d{4})-(\d{2})-(\d{2})#', '$3-$2-$1', $model->file_cp_ds);
                    return $tt;
                }

            ],

            //'file_cp_ds',
            //'file_cp_del',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
