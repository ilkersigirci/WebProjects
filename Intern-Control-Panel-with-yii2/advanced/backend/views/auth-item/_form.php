<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//for select2
use kartik\select2\Select2;
use backend\models\AuthItem;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-form">

    <?php $form = ActiveForm::begin(); ?>


    <!-- Select2 -->
    <?= $form->field($model, 'authItems')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(AuthItem::find()-> all(), 'name','name'), //data kismi onemli , map(data of db record,value of the select option,actual value shown)
        'language' => 'tr',
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => true,  //oktay abi yazdi
        ],
    ]);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php 
    //echo $form->field($model, 'rule_name')->textInput(['maxlength' => true]) ?>

    <?php 
    //echo $form->field($model, 'data')->textInput() ?>

    <?php
    //echo $form->field($model, 'created_at')->textInput() ?>
    <?php
    //echo $form->field($model, 'updated__at')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
