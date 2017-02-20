<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model lilhamma\store\models\Store */
/* @var $form yii\widgets\ActiveForm */
/* @var $userModel */
/* @var $storeUsersIds */

$allUsers = $userModel::find()->all();
?>

<div class="store-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
    <?php 
    echo $form->field($model, 'user_ids')->label('Пользователи')
        ->widget(Select2::classname(), [
            'value' => $storeUsersIds,
            'data' => ArrayHelper::map($allUsers, "id", "name"),
            'options' => ['multiple' => true, 'placeholder' => 'Select users...']
        ]
    );
    ?>
    </div>
    
    <div class="form-group">
        <?= 
        Html::submitButton(
            $model->isNewRecord ? 'Create' : 'Update', 
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) 
        ?>
    </div>
    

    <?php ActiveForm::end(); ?>

</div>