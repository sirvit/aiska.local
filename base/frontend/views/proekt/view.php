<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Proekt */

$this->title = $model->id_proekt;
$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="proekt-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (\Yii::$app->user->can('updateProekt', ['author_id'=> $model->p_kz])): ?>
    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id_proekt], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_proekt], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить этот Проект?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php endif; ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_proekt',
            'p_nazvanie:ntext',
            'p_zapros',
            'p_komer:ntext',
            [
                'attribute'=>'Файлы КП',
                'format'=> 'html',
//                'value'=> ArrayHelper::getValue($model, 'sex.pol'),
                'value'=> function ($model){
                        return Html::a('Файлы КП', ['file-kp/viewproekt','id'=>$model->id_proekt]);
                }

            ],
            //'p_cproekt',
            //'p_czavod',
            'p_pzakaz:ntext',
            'p_pispolnitel:ntext',
//            'p_kz',
//            'p_dz',
            //'p_del',
        ],
    ]) ?>

</div>
