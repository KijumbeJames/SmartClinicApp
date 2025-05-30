<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use app\models\Doctor;

class DoctorController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['dashboard', 'profile', 'edit-profile'],
                'rules' => [
                    [
                        'actions' => ['dashboard', 'profile', 'edit-profile'],
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
    $doctor = Doctor::findOne(['user_id' => Yii::$app->user->id]);  // <-- FIX: add missing closing bracket

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
    $doctorId = Yii::$app->user->id;
    $today = date('Y-m-d');

    $appointments = \app\models\Appointment::find()
        ->where(['doctor_id' => $doctorId, 'appointment_date' => $today])
        ->with('patient') // assumes relation defined
        ->orderBy(['appointment_time' => SORT_ASC])
        ->all();

    return $this->render('today-appointments', [
        'appointments' => $appointments,
    ]);
}

  public function actionQueue()
{
    $appointments = \app\models\Appointment::find()
        ->where([
            'doctor_id' => Yii::$app->user->id,
            'appointment_date' => date('Y-m-d'),
            'status' => 'pending'
        ])
        ->orderBy(['appointment_time' => SORT_ASC])
        ->all();

    return $this->render('queue', [
        'appointments' => $appointments
    ]);
}

public function actionMark($id, $status)
{
    $appointment = \app\models\Appointment::findOne(['id' => $id, 'doctor_id' => Yii::$app->user->id]);

    if (!$appointment) {
        throw new \yii\web\NotFoundHttpException("Appointment not found.");
    }

    if (in_array($status, ['attended', 'missed'])) {
        $appointment->status = $status;
        $appointment->save(false);
        Yii::$app->session->setFlash('success', "Appointment marked as $status.");
    }

    return $this->redirect(['doctor/queue']);
}


}

