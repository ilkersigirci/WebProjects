<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BookReviews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-reviews-form">

    <?php $form = ActiveForm::begin(
      //  ['enableAjaxValidation'=>true,'validationUrl'=>'ajaxvalidate']
    ); ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
