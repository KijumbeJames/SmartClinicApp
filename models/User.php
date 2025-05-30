<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements IdentityInterface
{
    public $password;  // <-- add this to hold the plain password input temporarily

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['username'], 'required'],
            [['password'], 'required', 'on' => 'create'],  // require password on creation
            [['password'], 'string', 'min' => 6],
            [['username'], 'string', 'max' => 255],
            [['password_hash', 'auth_key', 'access_token'], 'string', 'max' => 255],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['username', 'password'];  // password required only on create
        $scenarios['update'] = ['username'];  // no password required on update by default
        return $scenarios;
    }

    /**
     * Automatically hashes password before saving, if password attribute is set
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (!empty($this->password)) {
                $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
            }
            return true;
        }
        return false;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
}

