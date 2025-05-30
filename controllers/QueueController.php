<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use app\models\Queue;
use app\models\Patient;
use app\models\Doctor;

class QueueController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['join', 'status'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return Yii::$app->user->identity->role === 'patient';
                        },
                    ],
                ],
            ],
        ];
    }

    public function actionJoin()
    {
        $userId = Yii::$app->user->id;
        $patient = Patient::findOne(['user_id' => $userId]);

        if (!$patient) {
            throw new \yii\web\NotFoundHttpException('Patient record not found.');
        }

        $existing = Queue::find()
            ->where(['patient_id' => $patient->id])
            ->andWhere(['between', 'joined_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])
            ->one();

        if ($existing) {
            Yii::$app->session->setFlash('info', 'You have already joined the queue today.');
            return $this->redirect(['status']);
        }

        $model = new Queue();

        if ($model->load(Yii::$app->request->post())) {
            $model->patient_id = $patient->id;
            $model->status = 'waiting';
            $model->joined_at = date('Y-m-d H:i:s');

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'You have joined the queue successfully.');
                return $this->redirect(['status']);
            }
        }

        $doctors = ArrayHelper::map(Doctor::find()->all(), 'id', 'full_name');

        return $this->render('join', [
            'model' => $model,
            'doctors' => $doctors,
        ]);
    }

    public function actionStatus()
    {
        $patient = Patient::findOne(['user_id' => Yii::$app->user->id]);

        if (!$patient) {
            throw new \yii\web\NotFoundHttpException("Patient record not found.");
        }

        $queue = Queue::find()
            ->where(['patient_id' => $patient->id])
            ->orderBy(['joined_at' => SORT_DESC])
            ->one();

        return $this->render('status', ['queue' => $queue]);
    }
}

