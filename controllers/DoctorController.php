<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use app\models\Doctor;
use app\models\Appointment;

class DoctorController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['dashboard', 'profile', 'edit-profile', 'today-appointments', 'queue', 'mark'],
                'rules' => [
                    [
                        'actions' => ['dashboard', 'profile', 'edit-profile', 'today-appointments', 'queue', 'mark'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return Yii::$app->user->identity->role === 'doctor';
                        },
                    ],
                ],
            ],
        ];
    }

    public function actionDashboard()
    {
        return $this->render('dashboard');
    }

    public function actionEditProfile()
    {
        $doctor = Doctor::findOne(['user_id' => Yii::$app->user->id]);

        if (!$doctor) {
            throw new NotFoundHttpException("Doctor profile not found.");
        }

        if ($doctor->load(Yii::$app->request->post()) && $doctor->save()) {
            Yii::$app->session->setFlash('success', 'Profile updated successfully.');
            return $this->refresh();
        }

        return $this->render('edit-profile', [
            'model' => $doctor,
        ]);
    }

    public function actionTodayAppointments()
    {
        $userId = Yii::$app->user->id;
        $doctor = Doctor::findOne(['user_id' => $userId]);
        if (!$doctor) {
            throw new NotFoundHttpException('Doctor profile not found.');
        }

        $today = date('Y-m-d');
        $appointments = Appointment::find()
            ->where(['doctor_id' => $doctor->id, 'appointment_date' => $today])
            ->with('patient')
            ->orderBy(['appointment_time' => SORT_ASC])
            ->all();

        return $this->render('today-appointments', [
            'appointments' => $appointments,
        ]);
    }

    public function actionQueue()
    {
        $userId = Yii::$app->user->id;
        $doctor = Doctor::findOne(['user_id' => $userId]);
        if (!$doctor) {
            throw new NotFoundHttpException('Doctor profile not found.');
        }

        $appointments = Appointment::find()
            ->where([
                'doctor_id' => $doctor->id,
                'appointment_date' => date('Y-m-d'),
                'status' => 'pending',
            ])
            ->orderBy(['appointment_time' => SORT_ASC])
            ->all();

        return $this->render('queue', [
            'appointments' => $appointments,
        ]);
    }

    public function actionMark($id, $status)
    {
        $userId = Yii::$app->user->id;
        $doctor = Doctor::findOne(['user_id' => $userId]);
        if (!$doctor) {
            throw new NotFoundHttpException('Doctor profile not found.');
        }

        $appointment = Appointment::findOne(['id' => $id, 'doctor_id' => $doctor->id]);
        if (!$appointment) {
            throw new NotFoundHttpException("Appointment not found.");
        }

        if (in_array($status, ['attended', 'missed'])) {
            $appointment->status = $status;
            $appointment->save(false);
            Yii::$app->session->setFlash('success', "Appointment marked as $status.");
        }

        return $this->redirect(['doctor/queue']);
    }
}

