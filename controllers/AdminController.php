<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

class AdminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['dashboard'],
                'rules' => [
                    [
                        'actions' => ['dashboard'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return Yii::$app->user->identity->role === 'admin';
                        }
                    ],
                ],
            ],
        ];
    }

    public function actionDashboard()
    {
        return $this->render('dashboard');
    }
}

