<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;  // <--- add this line
use app\models\User;
use app\models\Patient;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

class PatientController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['dashboard'],
                'rules' => [
                    [
                        'actions' => ['dashboard'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return Yii::$app->user->identity->role === 'patient';
                        }
                    ],
                ],
            ],
        ];
    }

    public function actionDashboard()
    {
        return $this->render('dashboard');
    }

    public function actionRegister()
{
    $user = new User();
    $patient = new Patient();

    // Set the scenario so password validation works
    $user->scenario = 'create';

    if ($user->load(Yii::$app->request->post()) && $patient->load(Yii::$app->request->post())) {
        $user->auth_key = Yii::$app->security->generateRandomString();

        // Use $user->password (plain) to generate the hash
        $user->password_hash = Yii::$app->security->generatePasswordHash($user->password);

        $user->role = 'patient';

        if ($user->save()) {
            $patient->user_id = $user->id;
            $patient->created_at = date('Y-m-d H:i:s');

            if ($patient->save()) {
                // Registration success — redirect or flash message
                return $this->redirect(['site/login']); // or wherever you want
            }
        }
    }

    return $this->render('register', [
        'user' => $user,
        'patient' => $patient,
    ]);
}

}

