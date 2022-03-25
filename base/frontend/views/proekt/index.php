<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\icons\Icon;
use common\models\User;
Icon::map($this);
/* @var $this yii\web\View */
/* @var $searchModel common\models\ProektSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Проекты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proekt-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать Проект', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php //Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id_proekt',
            'p_nazvanie:ntext',
            //'p_zapros',
            [
                'attribute' =>'p_zapros',
                'value' => function($model){
                    $tt=preg_replace('#(\d{4})-(\d{2})-(\d{2})#', '$3-$2-$1', $model->p_zapros);
                    return $tt;
                }

            ],
            'p_komer:ntext',
            [
                'attribute' =>'КПредлож',
                'format'=> 'html',
                'contentOptions' => ['style'=>'vertical-align: middle; text-align: center;'],
                'value' => function($model){
                    return Html::a( Icon::show('folder-open'), ['file-kp/viewproekt','id'=>$model->id_proekt]);
                }

            ],
            [
                'attribute' =>'ЧПроект',
                'format'=> 'html',
                'contentOptions' => ['style'=>'vertical-align: middle; text-align: center;'],
                'value' => function($model){
                    return Html::a( Icon::show('folder-open'), ['file-cp/viewproekt','id'=>$model->id_proekt]);
                }

            ],
            [
                'attribute' =>'ЧЗавод',
                'format'=> 'html',
                'contentOptions' => ['style'=>'vertical-align: middle; text-align: center;'],
                'value' => function($model){
                    return Html::a( Icon::show('folder-open'), ['file-cz/viewproekt','id'=>$model->id_proekt]);
                }

            ],
            //'existsFile:text',
//            [
//                'class' => 'yii\grid\ActionColumn',
//                'template' => '{link}',
//                'buttons' => [
//                    'link' => function ($url,$model,$key) {
//                        return Html::a('Файлы КП', ['file-kp/viewproekt','id'=>$key]);
//                    },
//                ],
//            ],
            //'p_cproekt',
            //'p_czavod',
            'p_pzakaz:ntext',
            'p_pispolnitel:ntext',
            //'username',
            [
                'attribute' =>'Кто завел',
//                'format'=> 'html',
                'contentOptions' => ['style'=>'vertical-align: middle; text-align: center;'],
                'value' => function($row){
                     $res =User::findOne(['id'=>$row->p_kz]);
                    return $res->username;
                }

            ],
            //'p_kz',
            //'p_dz',
            //'p_del',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php //Pjax::end(); ?>

</div>
