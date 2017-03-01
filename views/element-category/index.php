<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $searchModel lilhamma\store\models\ElementCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $newElementCategoryModel lilhamma\store\models\ElementCategory */

$allCategories = $searchModel::find()->all();

$this->title = 'Element Categories';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="element-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Добавить категорию</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <?php $form = ActiveForm::begin(); ?>
                <div class="col-sm-12 col-md-4">
                    <?php 
                    echo $form->field($newElementCategoryModel, 'name')
                        ->textInput(
                            [
                                'maxlength' => true, 
                                'placeholder' => 'Наименование'
                            ])
                        ->label(false) 
                    ?>
                </div>
                <div class="col-sm-12 col-md-4">
                    <?php 
                    echo $form->field($newElementCategoryModel, 'parent_id')
                        ->label(false)
                        ->widget(Select2::classname(), [
                            'value' => array_column($allCategories, 'id'),
                            'data' => ArrayHelper::map($allCategories, "id", "name"),
                            'options' => [
                                'multiple' => false, 
                                'placeholder' => 'Родительская категория ()'
                            ]
                        ]
                    );
                    ?>
                </div>
                <div class="col-sm-3 col-md-2">
                    <?php 
                    echo Html::submitButton(
                        'Добавить', 
                        ['class' => 'btn btn-success']
                    )
                    ?>
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
            'parent_id',

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
