<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model lilhamma\store\models\Store */
/* @var $userModel */
/* @var $storeUsersIds */

$this->title = 'Update Store: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="store-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'userModel' => $userModel,
        'storeUsersIds' => $storeUsersIds,
    ]) ?>

</div>