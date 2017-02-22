<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel lilhamma\store\models\ElementCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Element Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="element-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Element Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'parent_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
