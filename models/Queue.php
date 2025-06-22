<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;


class Queue extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'queue';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => date('Y-m-d H:i:s'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['appointment_id', 'position'], 'required'],
            [['appointment_id', 'patient_id', 'doctor_id', 'position', 'estimated_wait'], 'integer'],
            [[ 'created_at', 'updated_at'], 'safe'],
            ['status', 'in', 'range' => ['waiting', 'in_progress', 'done', 'missed']],
            ['notes', 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'appointment_id' => 'Appointment ID',
            'patient_id' => 'Patient ID',
            'doctor_id' => 'Doctor ID',
            'position' => 'Position',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'estimated_wait' => 'Estimated Wait (mins)',
            'notes' => 'Notes',
        ];
    }

    /**
     * Relation to Appointment
     * @return \yii\db\ActiveQuery
     */
    public function getAppointment()
    {
        return $this->hasOne(Appointment::class, ['id' => 'appointment_id']);
    }

    /**
     * Relation to Patient (optional if patient_id is set)
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patient::class, ['id' => 'patient_id']);
    }

    /**
     * Relation to Doctor (optional if doctor_id is set)
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctor::class, ['id' => 'doctor_id']);
    }

    /**
     * Automatically set defaults before insert
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if ($insert) {
            // Default status
            $this->status = 'waiting';
            // Determine position: max + 1
            $maxPosition = self::find()
                ->where(['status' => 'waiting'])
                ->max('position');
            $this->position = $maxPosition !== null ? $maxPosition + 1 : 1;
            // Assign patient_id and doctor_id from appointment
            if ($this->appointment) {
                $this->patient_id = $this->appointment->patient_id ?? null;
                $this->doctor_id = $this->appointment->doctor_id ?? null;
            }
        }
        return parent::beforeSave($insert);
    }
}

