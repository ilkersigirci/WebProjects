<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="posts-index">

    <h1><?= Html::encode($this->title) ?></h1>  

    <p>
        <?= Html::a('Create Posts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'post_id',
            'company_name',
            'post_name',
            'description',

            ['class' => 'yii\grid\ActionColumn'],  //add-delete actionlari
        ],
    ]); ?>
</div>  

