<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UserCompany */

$this->title = 'Update User Company: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-company-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
