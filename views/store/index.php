<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel lilhamma\store\models\StoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Добавить склад</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <?php $form = ActiveForm::begin(); ?>
                <div class="col-sm-12 col-md-4">
                    <?php echo $form->field($newStoreModel, 'name')->textInput(['maxlength' => true, 'placeholder' => 'наименование'])->label(false) ?>
                </div>
                <div class="col-sm-3 col-md-2">
                    <?php echo Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    
    
    
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            
            [
                'attribute' => 'user_ids',
                'content' => function($model) {
                    $stringUserNames = '';
                    foreach ($model->users as $user){
                        $stringUserNames = $stringUserNames . $user->name  . "; ";
                    }
                    return  Html::a($stringUserNames, ['/store/store/update', 'id' => $model->id]);
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                //'visible' => Yii::$app->user->can('administrator'),
                'buttonOptions' => ['class' => 'btn btn-default'],
                'options' => ['style' => 'width: 125px;']
            ],
            
        ],
    ]); ?>
</div>