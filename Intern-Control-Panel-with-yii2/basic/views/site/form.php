<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>


<?php
    $form=ActiveForm::begin();
    echo $form->field($model,'name');
    echo $form->field($model,'email');
    echo Html::submitButton('Submit',['class'=>'btn btn-success']);
?>  
