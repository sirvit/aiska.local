<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\FileSpecSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Файлы спецификации';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-spec-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить файл спецификации', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_file_spec',
            'id_kontrakt',
            'file_spec_content',
            'file_spec_name',
            'file_spec_kz',
            //'file_spec_ds',
            //'file_spec_del',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
