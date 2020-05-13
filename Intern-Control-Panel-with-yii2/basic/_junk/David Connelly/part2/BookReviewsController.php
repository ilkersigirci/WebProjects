<?php

namespace app\controllers;

use Yii;
use app\models\BookReviews;

class BookReviewsController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $model = new BookReviews();
    
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }
    
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDisplay()
    {
        return $this->render('display');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
