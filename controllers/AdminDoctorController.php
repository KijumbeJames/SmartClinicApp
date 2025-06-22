<?php

namespace app\controllers;

use Yii;
use app\models\Doctor;
use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

class AdminDoctorController extends Controller
{
    public function behaviors()
{
    return [
        'access' => [
            'class' => AccessControl::class,
            'only' => ['index', 'view', 'create', 'update', 'delete'],
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'], // means logged-in users
                    'matchCallback' => function ($rule, $action) {
                        return Yii::$app->user->identity->role === 'admin';
                    },
                ],
            ],
        ],
    ];
}

    public function actionIndex()
    {
        $doctors = Doctor::find()->with('user')->all();
        return $this->render('index', ['doctors' => $doctors]);
    }

    public function actionView($id)
    {
        return $this->render('view', ['model' => $this->findModel($id)]);
    }

    public function actionCreate()
    {
        $model = new Doctor();
        $user = new User();

        if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
            $user->role = 'doctor';
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->access_token = Yii::$app->security->generateRandomString();
            $user->password_hash = Yii::$app->security->generatePasswordHash($user->password_hash);

            if ($user->save()) {
                $model->user_id = $user->id;
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Doctor created successfully.');
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('create', ['model' => $model, 'user' => $user]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user = $model->user;

        if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
            if ($user->save() && $model->save()) {
                Yii::$app->session->setFlash('success', 'Doctor updated.');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', ['model' => $model, 'user' => $user]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->user->delete(); // delete user also
        $model->delete();
        Yii::$app->session->setFlash('success', 'Doctor deleted.');
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Doctor::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Doctor not found.');
    }
}

