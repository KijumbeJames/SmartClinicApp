<?php

namespace app\components;

use yii\base\ActionFilter;
use Yii;

class AccessControl extends ActionFilter
{
    public $role;

    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            return Yii::$app->response->redirect(['site/login']);
        }

        if (Yii::$app->user->identity->role !== $this->role) {
            Yii::$app->session->setFlash('error', 'You do not have permission to access this page.');
            return Yii::$app->response->redirect(['site/index']);
        }

        return parent::beforeAction($action);
    }
}

