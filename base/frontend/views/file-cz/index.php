<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\User;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\FileCzSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Файлы чертежей завода';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-cz-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить файл чертежи завода', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id_file_cz',
            //'id_proekt',
            //'file_cz_content',
            [
                'attribute'=>'Файл',
                'format'=> 'html',
                'value'=> function($data){
                    $dir = Yii::getAlias('@web/public_html/uploads/images').'/cz/';
                    $result = Html::a($data->file_cz_name, Url::to($dir.$data->file_cz_content,true));
                    return $result;

                }

            ],
            //'file_cz_name',
            //'file_cz_kz',
            [
                'attribute' =>'Кто завел',
//                'format'=> 'html',
                'contentOptions' => ['style'=>'vertical-align: middle; text-align: center;'],
                'value' => function($row){
                    $res =User::findOne(['id'=>$row->file_cz_kz]);
                    if ($res) { return $res->username;} else return 'неизвестно';
                }

            ],
            [
                'attribute' =>'file_kp_ds',
                'value' => function($model){
                    $tt=preg_replace('#(\d{4})-(\d{2})-(\d{2})#', '$3-$2-$1', $model->file_cz_ds);
                    return $tt;
                }

            ],
            //'file_cz_ds',
            //'file_cz_del',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
