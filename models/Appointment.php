<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appointment".
 *
 * @property int $id
 * @property int $patient_id
 * @property int $doctor_id
 * @property string $appointment_date
 * @property string $appointment_time
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Appointment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appointment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patient_id', 'doctor_id', 'appointment_date', 'appointment_time'], 'required'],

            [['patient_id', 'doctor_id'], 'integer'],

            ['appointment_date', 'date', 'format' => 'php:Y-m-d'],
            ['appointment_time', 'time', 'format' => 'php:H:i'], // ✅ 24-hour format: 00:00 - 23:59

            ['status', 'in', 'range' => ['pending', 'confirmed', 'cancelled', 'completed']],
            
            [['created_at', 'updated_at'], 'safe'], // allow automatic datetime fields
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'patient_id' => 'Patient',
            'doctor_id' => 'Doctor',
            'appointment_date' => 'Appointment Date',
            'appointment_time' => 'Appointment Time',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    // Optional relations
    public function getDoctor()
    {
        return $this->hasOne(Doctor::class, ['id' => 'doctor_id']);
    }

    public function getPatient()
    {
        return $this->hasOne(Patient::class, ['id' => 'patient_id']);
    }
}

