<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BookReviews */
/* @var $form ActiveForm */
?>
<div class="book-reviews-_form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'book_title') ?>
        <?= $form->field($model, 'author') ?>
        <?= $form->field($model, 'amazon_url') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- book-reviews-_form -->
