<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use app\models\Appointment;
use app\models\Doctor;
use app\models\Patient;

class AppointmentController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['book', 'mine'],
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

    /**
     * Book a new appointment
     */
    public function actionBook()
    {
        $model = new Appointment();

        // Get list of doctors for dropdown
        $doctors = Doctor::find()->all();
        $doctorList = ArrayHelper::map($doctors, 'id', function($doctor) {
        return $doctor->full_name . '  –  ' . $doctor->specialization;
   });


        // Get current patient record
        $patient = Patient::findOne(['user_id' => Yii::$app->user->id]);

        if (!$patient) {
            throw new NotFoundHttpException('Patient record not found.');
        }

        // Handle form submission
        if ($model->load(Yii::$app->request->post())) {
            $model->patient_id = $patient->id; // Set the correct patient ID

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Appointment booked successfully.');
                return $this->redirect(['mine']);
            }
        }

        return $this->render('book', [
        'model' => $model,
        'doctorList' => $doctorList, // ✅ Pass this to the view
    ]);
    }

    /**
     * View patient's upcoming appointments
     */
    public function actionMine()
    {
        // Get current patient
        $patient = Patient::findOne(['user_id' => Yii::$app->user->id]);

        if (!$patient) {
            throw new NotFoundHttpException('Patient record not found.');
        }

        // Fetch upcoming appointments for this patient
        $appointments = Appointment::find()
            ->where(['patient_id' => $patient->id])
            ->andWhere(['>=', 'appointment_date', date('Y-m-d')])
            ->orderBy(['appointment_date' => SORT_ASC])
            ->all();

        return $this->render('mine', [
            'appointments' => $appointments,
        ]);
    }
}

