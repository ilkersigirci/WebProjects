<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BookReviews */

$this->title = 'Create Book Reviews';
$this->params['breadcrumbs'][] = ['label' => 'Book Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-reviews-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
