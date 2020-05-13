<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal; //for pop-up view
use yii\helpers\Url;     //for pop-up view
use yii\widgets\Pjax;    //for pop-up view
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
            //echo Html::a('Create User', ['signup'], ['class' => 'btn btn-success']); // normalde "create"
        ?>

        <?php  //for pop-up view
            echo Html::button('Create User',['id'=>'modalButton','class' => 'btn btn-success','value'=>Url::to('users/signup')]); 
        ?>
    </p>

    <?php //for pop-up view
        Modal::begin([
            //'header'=>'<h4>Users</h4>',
            'id'=>'modal',
            'size'=>'modal-md',
        ]);
        echo "<div id='modalContent'></div>";
        Modal::end();
    ?>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            'status',
            //'created_at',
            //'updated_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>