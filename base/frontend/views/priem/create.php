<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Priem */

$this->title = 'Create Priem';
$this->params['breadcrumbs'][] = ['label' => 'Priems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="priem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
