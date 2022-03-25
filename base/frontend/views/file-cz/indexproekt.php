<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use common\models\User;
/* @var $this yii\web\View */
/* @var $searchModel common\models\FileKpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Файлы Чертежи завода для проекта'.'" '.$proekt->p_nazvanie.' "';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-cz-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить файл чертежи завода', ['createproekt','id'=>$proekt->id_proekt], ['class' => 'btn btn-success']) ?>
    </p>

    <?php //Pjax::begin(); ?>
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
                    $result = Html::a($data->file_cz_name, Url::to($dir.$data->file_cz_content,true));
                    return $result;

                }

            ],
            //'file_kp_name',
            //'file_kp_kz',
            //'file_kp_ds',
            //'file_kp_del',
            [
                'attribute' =>'Кто завел',
//                'format'=> 'html',
                'contentOptions' => ['style'=>'vertical-align: middle; text-align: center;'],
                'value' => function($row){
                    $res =User::findOne(['id'=>$row->file_cz_kz]);
                    if ($res) { return $res->username;} else return 'неизвестно';
                }

            ],
            //'file_kp_ds',
            [
                'attribute' =>'file_cz_ds',
                'value' => function($model){
                    $tt=preg_replace('#(\d{4})-(\d{2})-(\d{2})#', '$3-$2-$1', $model->file_cz_ds);
                    return $tt;
                }

            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php //Pjax::end(); ?>

</div>
