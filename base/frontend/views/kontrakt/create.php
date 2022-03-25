<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Kontrakt */

$this->title = 'Create Kontrakt';
$this->params['breadcrumbs'][] = ['label' => 'Kontrakts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kontrakt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
