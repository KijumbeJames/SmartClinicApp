<?php
namespace app\controllers;

use Yii;
use app\models\Patient;
use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

class AdminPatientController extends Controller
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

    public function actionIndex()
    {
        $patients = Patient::find()->with('user')->all();
        return $this->render('index', ['patients' => $patients]);
    }

    public function actionView($id)
    {
        return $this->render('view', ['model' => $this->findModel($id)]);
    }

    public function actionCreate()
    {
        $model = new Patient();
        $user  = new User();

        if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
            $user->role = 'patient';
            $user->auth_key      = Yii::$app->security->generateRandomString();
            $user->access_token  = Yii::$app->security->generateRandomString();
            $user->password_hash = Yii::$app->security->generatePasswordHash($user->password_hash);

            if ($user->save()) {
                $model->user_id = $user->id;
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Patient created successfully.');
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('create', [
            'model'    => $model,
            'user'     => $user,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user  = $model->user;

        if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())
            && $user->save() && $model->save()
        ) {
            Yii::$app->session->setFlash('success', 'Patient updated.');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'user'  => $user,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->user->delete();
        $model->delete();
        Yii::$app->session->setFlash('success', 'Patient deleted.');
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Patient::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Patient not found.');
    }
}

