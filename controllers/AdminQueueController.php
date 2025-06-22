<?php

namespace app\controllers;

use Yii;
use app\models\Queue;
use app\models\Appointment;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;

class AdminQueueController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'view', 'update', 'delete', 'create'],
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

    /**
     * List all queue entries.
     */
    public function actionIndex()
    {
        $queues = Queue::find()
            ->with(['appointment.patient', 'appointment.doctor'])
            ->orderBy(['position' => SORT_ASC])
            ->all();

        return $this->render('index', ['queues' => $queues]);
    }

    /**
     * View a single queue entry.
     * @param int $id
     */
    public function actionView($id)
    {
        return $this->render('view', ['model' => $this->findModel($id)]);
    }

    /**
     * Add an appointment to the queue.
     */
    public function actionCreate()
    {
        $model = new Queue();
        $appointments = Appointment::find()->all();
        $items = ArrayHelper::map($appointments, 'id', function($appt) {
            return $appt->patient->full_name . ' → ' . $appt->doctor->full_name . ' @ ' . $appt->appointment_date;
        });

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Added appointment to queue.');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'appointments' => $items,
        ]);
    }

    /**
     * Update queue entry (e.g., change status).
     * @param int $id
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Queue entry updated.');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', ['model' => $model]);
    }

    /**
     * Delete a queue entry.
     * @param int $id
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Queue entry removed.');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Queue model based on its primary key.
     * @param int $id
     * @return Queue
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Queue::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Requested queue entry not found.');
    }
}

