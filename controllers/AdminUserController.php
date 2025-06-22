<?php
//===== controllers/AdminUserController.php =====
namespace app\controllers;

use Yii;
use app\models\User;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;

class AdminUserController extends Controller
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
                        'roles' => ['@'],
                        'matchCallback' => fn() => Yii::$app->user->identity->role === 'admin',
                    ],
                ],
            ],
        ];
    }

    // List users
    public function actionIndex()
    {
        $users = User::find()->all();
        return $this->render('index', ['users' => $users]);
    }

    // View single user
    public function actionView($id)
    {
        return $this->render('view', ['model' => $this->findModel($id)]);
    }

    // Create user
    public function actionCreate()
    {
        $model = new User();
        $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'User created successfully.');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $roles = ['admin' => 'Admin', 'doctor' => 'Doctor', 'patient' => 'Patient'];
        return $this->render('create', ['model' => $model, 'roles' => $roles]);
    }

    // Update user
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'User updated successfully.');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $roles = ['admin' => 'Admin', 'doctor' => 'Doctor', 'patient' => 'Patient'];
        return $this->render('update', ['model' => $model, 'roles' => $roles]);
    }

    // Delete user
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'User deleted.');
        return $this->redirect(['index']);
    }

    // Find model
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('User not found.');
    }
}
