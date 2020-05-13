<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BookReviews */

$this->title = 'Update Book Reviews: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Book Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="book-reviews-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_update_image', [
        'model' => $model,
    ]) ?>

</div>