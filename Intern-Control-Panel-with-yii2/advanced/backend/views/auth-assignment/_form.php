<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
use backend\models\AuthAssignment;
use backend\models\AuthItem;
use backend\models\Users;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model backend\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(); ?>
    <!-- Original Ones -->
    <?php
    /*echo $form->field($model, 'item_name')->textInput(['maxlength' => true]) */?>

    <?php
    /*echo $form->field($model, 'user_id')->textInput(['maxlength' => true])*/ ?>

    <?php
    /*echo $form->field($model, 'created_at')->textInput() */?>

    <!-- Custom Ones -->
    <?php
    echo $form->field($model, 'itemNameIds')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(AuthItem::find()-> all(), 'name','name'),
        'language' => 'tr',
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => true,
        ]
    ]); 
    ?>

    <?php
    echo $form->field($model, 'users')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Users::find()-> all(), 'id','username'),
        'language' => 'tr',
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => true,
        ]
    ]); 
    ?>

    
    
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
