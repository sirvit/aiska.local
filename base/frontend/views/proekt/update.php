<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Proekt */

$this->title = 'Изменить Проект: " ' . $model->p_nazvanie . ' "';
$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_proekt, 'url' => ['view', 'id' => $model->id_proekt]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="proekt-update">
    <?php if (\Yii::$app->user->can('updateProekt', ['author_id'=> $model->p_kz])): ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <?php else: echo 'Вам запрещен доступ!'; endif; ?>
</div>
