<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Report extends ActiveRecord
{
    public static function tableName()
    {
        return 'report';
    }

    public function rules()
    {
        return [
            [['doctor_id', 'patient_id', 'date'], 'required'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['doctor_id', 'patient_id'], 'integer'],
        ];
    }

    public function generateReport($doctor_id, $date)
    {
        return self::find()
            ->where(['doctor_id' => $doctor_id, 'date' => $date])
            ->all();
    }
}

