<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Doctor extends ActiveRecord
{
    public static function tableName()
    {
        return 'doctor'; // make sure your DB table name is exactly this
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,  // no updated_at column
                'value' => date('Y-m-d H:i:s'), // format to save datetime string
            ],
        ];
    }

    public function rules()
    {
        return [
            [['user_id', 'full_name', 'specialization', 'phone'], 'required'],
            [['user_id'], 'integer'],
            [['full_name', 'specialization'], 'string', 'max' => 255],
            ['phone', 'string', 'max' => 20],
            ['phone', 'match', 'pattern' => '/^\+?[0-9\s\-]{7,20}$/', 'message' => 'Phone number is not valid.'],
            [['created_at'], 'safe'], // now handled automatically but still safe for validation
            [['user_id'], 'unique'], // each user can only be one doctor
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'full_name' => 'Full Name',
            'specialization' => 'Specialization',
            'phone' => 'Phone',
            'created_at' => 'Created At',
        ];
    }

    // Relation to User model (one-to-one)
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    // Relation to Appointment model (one-to-many)
    public function getAppointments()
    {
        return $this->hasMany(Appointment::class, ['doctor_id' => 'id']);
    }
}

