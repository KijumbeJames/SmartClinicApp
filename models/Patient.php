<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Patient extends ActiveRecord
{
    public static function tableName()
    {
        return 'patient';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
                'value' => date('Y-m-d H:i:s'),
            ],
        ];
    }

    public function rules()
    {
        return [
            [['user_id', 'full_name', 'gender', 'date_of_birth', 'phone', 'address'], 'required'],
            [['user_id'], 'integer'],
            [['user_id'], 'unique'],
            [['full_name'], 'string', 'max' => 255],
            [['gender'], 'in', 'range' => ['male', 'female', 'other']],
            [['date_of_birth'], 'date', 'format' => 'php:Y-m-d'],
            [['phone'], 'string', 'max' => 20],
            [['address'], 'string'],
            [['created_at'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'full_name' => 'Full Name',
            'gender' => 'Gender',
            'date_of_birth' => 'Date of Birth',
            'phone' => 'Phone',
            'address' => 'Address',
            'created_at' => 'Created At',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}

