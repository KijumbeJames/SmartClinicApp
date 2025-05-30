<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\Prescription;
use app\models\Appointment;
use app\models\Patient;
use yii\web\NotFoundHttpException;

class PrescriptionController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'create', 'view', 'update', 'delete', 'mine'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'view', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return Yii::$app->user->identity->role === 'doctor';
                        },
                    ],
                    [
                        'actions' => ['mine'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return Yii::$app->user->identity->role === 'patient';
                        },
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $query = Prescription::find()
            ->where(['doctor_id' => Yii::$app->user->identity->id])
            ->orderBy(['created_at' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
        ]);

        $appointments = Appointment::find()
            ->where(['doctor_id' => Yii::$app->user->identity->id])
            ->orderBy(['id' => SORT_DESC])
            ->all();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'appointments' => $appointments,
        ]);
    }

    public function actionCreate($appointment_id)
    {
        $model = new Prescription();
        $model->doctor_id = Yii::$app->user->identity->id;

        $appointment = Appointment::findOne(['id' => $appointment_id, 'doctor_id' => $model->doctor_id]);
        if (!$appointment) {
            throw new NotFoundHttpException('Invalid appointment ID or not your appointment.');
        }

        $model->appointment_id = $appointment_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Prescription saved successfully.');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', ['model' => $model]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->doctor_id != Yii::$app->user->identity->id) {
            throw new NotFoundHttpException('You are not allowed to view this prescription.');
        }

        return $this->render('view', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->doctor_id != Yii::$app->user->identity->id) {
            throw new NotFoundHttpException('You are not allowed to update this prescription.');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Prescription updated successfully.');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if ($model->doctor_id != Yii::$app->user->identity->id) {
            throw new NotFoundHttpException('You are not allowed to delete this prescription.');
        }

        $model->delete();
        Yii::$app->session->setFlash('success', 'Prescription deleted successfully.');
        return $this->redirect(['index']);
    }

    public function actionMine()
    {
        $patient = Patient::findOne(['user_id' => Yii::$app->user->id]);

        if (!$patient) {
            throw new NotFoundHttpException("Patient record not found.");
        }

        $prescriptions = Prescription::find()
            ->where(['patient_id' => $patient->id])
            ->orderBy(['created_at' => SORT_DESC])
            ->all();

        return $this->render('mine', ['prescriptions' => $prescriptions]);
    }

    protected function findModel($id)
    {
        if (($model = Prescription::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested prescription does not exist.');
    }
}

