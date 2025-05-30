<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\LoginForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'], // Only authenticated users
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index'); // views/site/index.php
    }

    public function actionLogin()
{
    if (!Yii::$app->user->isGuest) {
        return $this->goHome();
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
        $user = Yii::$app->user->identity;

        if ($user->role === 'admin') {
            return $this->redirect(['admin/dashboard']);
        } elseif ($user->role === 'doctor') {
            return $this->redirect(['doctor/dashboard']);
        } elseif ($user->role === 'patient') {
            return $this->redirect(['patient/dashboard']);
        } else {
            return $this->goHome();
        }
    }

    return $this->render('login', ['model' => $model]);
}


    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

   public function actionRegister()
{
    return $this->redirect(['patient/register']);
}

}

