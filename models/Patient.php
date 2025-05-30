<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Patient extends ActiveRecord
{
    public static function tableName()
    {
        return 'patient';
    }

    public function rules()
    {
        return [
            [['full_name', 'gender', 'date_of_birth', 'phone', 'address'], 'required'],
            [['full_name'], 'string', 'max' => 255],
            [['gender'], 'in', 'range' => ['male', 'female', 'other']],
            [['date_of_birth'], 'date', 'format' => 'php:Y-m-d'],
            [['phone'], 'string', 'max' => 20],
            [['address'], 'string'],
            [['created_at'], 'safe'],
            [['user_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'full_name' => 'Full Name',
            'gender' => 'Gender',
            'date_of_birth' => 'Date of Birth',
            'phone' => 'Phone',
            'address' => 'Address',
            'created_at' => 'Created At',
        ];
    }

    // Relation to User if you want
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}

