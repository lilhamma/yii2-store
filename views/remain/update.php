<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model lilhamma\store\models\Remain */

$this->title = 'Update Remain: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Remains', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="remain-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
