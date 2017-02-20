<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model lilhamma\store\models\Remain */

$this->title = 'Create Remain';
$this->params['breadcrumbs'][] = ['label' => 'Remains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="remain-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
