<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Queue extends ActiveRecord
{
    public static function tableName()
    {
        return 'queue';
    }

    public function rules()
{
    return [
        [['patient_id', 'doctor_id', 'appointment_time'], 'required'],
        [['patient_id', 'doctor_id'], 'integer'],
        [['appointment_time'], 'safe'],
        [['status'], 'in', 'range' => ['waiting', 'attended', 'missed']],
    ];
}


    public function addPatientToQueue($patient_id, $doctor_id, $appointment_time)
    {
        $this->patient_id = $patient_id;
        $this->doctor_id = $doctor_id;
        $this->appointment_time = $appointment_time;
        $this->status = 'waiting';
        return $this->save();
    }

    public function getPatient()
{
    return $this->hasOne(Patient::class, ['id' => 'patient_id']);
}

public function getDoctor()
{
    return $this->hasOne(Doctor::class, ['id' => 'doctor_id']);
}

 public function beforeSave($insert)
    {
        if ($insert) {
            $this->patient_id = Yii::$app->user->id;  // Assign patient ID automatically
            $this->joined_at = date('Y-m-d H:i:s');   // example timestamp
        }
        return parent::beforeSave($insert);
    }
 
}

