<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

use frontend\models\SignupForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [            
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','language'],   //buraya signup ekleyip eklememek bir sey degistirmiyor   ||| language internatianalizaton icin
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','signup','set-cookie','show-cookie'],     // for cookies 'set-cookie','show-cookie' 
                        'allow' => true,                                                          //yukaridakilerin view filelarini tanimlamasak bile browsera yazinca cikiyorlar
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    //for cookies

    public function actionSetCookie()
    {
        $cookie=new yii\web\Cookie([
            'name'=>'test',
            'value'=>'test cookie value'
        ]);
        Yii::$app->getResponse()->getCookies()->add($cookie);
    }

    public function actionShowCookie()
    {
        if(Yii::$app->getRequest()->getCookies()->has('test')){
            print_r(Yii::$app->getRequest()->getCookies()->getValue('test'));
        }
    }


    //for internationalization
    public function actionLanguage()
    {
        if(isset($_POST['lang'])){
            Yii::$app->language=$_POST['lang'];
            $cookie = new yii\web\Cookie([
                'name'=>'lang',
                'value'=>$_POST['lang']
            ]);

            Yii::$app->getResponse()->getCookies()->add($cookie);
        }
    }
}
