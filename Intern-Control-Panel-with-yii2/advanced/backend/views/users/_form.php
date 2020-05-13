<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?php 
    //echo $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?php 
    //echo $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?php 
    //echo $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php 
    //echo $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?php 
    //echo $form->field($model, 'created_at')->textInput() ?>

    <?php 
    //echo $form->field($model, 'updated_at')->textInput() ?>

    <?php  //for permissions
    /* echo $form->field($model, 'permissions')->widget(Select2::classname(), [
            'data' => ArrayHelper::map($authItems, 'name','name'), //data kismi onemli , map(data of db record,value of the select option,actual value shown)
            'language' => 'tr',
            'options' => ['placeholder' => 'Select a state ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'multiple' => true,
            ],
        ]); */
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>