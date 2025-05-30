<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use app\models\User;
use app\models\Doctor;
use app\models\Patient;

class ProfileController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['edit'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], // any logged-in user
                    ],
                ],
            ],
        ];
    }

    public function actionEdit()
    {
        $user = Yii::$app->user->identity;
        $role = $user->role;

        if ($role === 'doctor') {
            $model = Doctor::findOne(['user_id' => $user->id]);
            $view = 'edit-doctor';
        } elseif ($role === 'patient') {
            $model = Patient::findOne(['user_id' => $user->id]);
            $view = 'edit-patient';
        } else {
            throw new NotFoundHttpException('Unsupported role.');
        }

        if (!$model) {
            throw new NotFoundHttpException('Profile not found.');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Profile updated successfully.');
            return $this->refresh();
        }

        return $this->render($view, ['model' => $model]);
    }
}

