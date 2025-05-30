<?php
namespace app\models;

use yii\db\ActiveRecord;

class Prescription extends ActiveRecord
{
    public static function tableName()
    {
        return 'prescription';
    }

    public function rules()
    {
        return [
            [['appointment_id', 'doctor_id'], 'required'],
            [['appointment_id', 'doctor_id'], 'integer'],
            [['notes'], 'string'],
            [['medication', 'dosage'], 'string', 'max' => 255],
            [['duration'], 'string', 'max' => 100],
            [['created_at'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'appointment_id' => 'Appointment ID',
            'doctor_id' => 'Doctor ID',
            'medication' => 'Medication',
            'dosage' => 'Dosage',
            'duration' => 'Duration',
            'notes' => 'Additional Notes',
            'created_at' => 'Created At',
        ];
    }

  public function getDoctor()
{
    return $this->hasOne(Doctor::class, ['id' => 'doctor_id']);
}

public function getAppointment()
{
    return $this->hasOne(Appointment::class, ['id' => 'appointment_id']);
}

public function getPatient()
{
    return $this->hasOne(Patient::class, ['id' => 'patient_id'])->via('appointment');
}

}

