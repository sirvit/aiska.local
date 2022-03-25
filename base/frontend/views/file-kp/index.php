<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\User;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\FileKpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Файлы Коммерческое предложение';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-kp-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить файл коммерческого предложения', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id_file_kp',
            //'id_proekt',
            //'file_kp_content',
            [
                'attribute'=>'Файл',
                'format'=> 'html',
                'value'=> function($data){
                    $dir = Yii::getAlias('@web/public_html/uploads/images').'/kp/';
                    $result = Html::a($data->file_kp_name, Url::to($dir.$data->file_kp_content,true));
                    return $result;

                }

            ],
            //'file_kp_name',
            //'file_kp_kz',
            [
                'attribute' =>'Кто завел',
//                'format'=> 'html',
                'contentOptions' => ['style'=>'vertical-align: middle; text-align: center;'],
                'value' => function($row){
                    $res =User::findOne(['id'=>$row->file_kp_kz]);
                    if ($res) { return $res->username;} else return 'неизвестно';
                }

            ],
            [
                'attribute' =>'file_kp_ds',
                'value' => function($model){
                    $tt=preg_replace('#(\d{4})-(\d{2})-(\d{2})#', '$3-$2-$1', $model->file_kp_ds);
                    return $tt;
                }

            ],
            //'file_kp_ds',
            //'file_kp_del',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
