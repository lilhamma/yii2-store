<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model lilhamma\store\models\ElementCategory */
/* @var $form yii\widgets\ActiveForm */
/* @var $searchModel lilhamma\store\models\ElementCategorySearch */

$allCategories = $searchModel::find()->all();
?>

<div class="element-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php 
    echo $form->field($model, 'parent_id')
        ->label(false)
        ->widget(Select2::classname(), [
            'value' => $model->parent_id,
            'data' => ArrayHelper::map($allCategories, "id", "name"),
            'options' => [
                'multiple' => false, 
                'placeholder' => 'Родительская категория ()'
            ]
        ]
    );
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
