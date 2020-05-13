<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
use backend\models\Users;
use backend\models\Company;
use backend\models\UserCompany;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\UserCompany */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
    //echo $form->field($model, 'user_id')->textInput() ?>

    <?php 
    //echo $form->field($model, 'company_id')->textInput() ?>

    <?php
    echo $form->field($model, 'user_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Users::find()-> all(), 'id','username'),
        'language' => 'tr',
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => false,
        ]
    ]); 
    ?>

    <?php
    echo $form->field($model, 'company_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Company::find()-> all(), 'id','company_name'),
        'language' => 'tr',
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => false,
        ]
    ]); 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
