<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "USERS".
 *
 * @property integer $ID_USER
 * @property string $USERNAME
 * @property string $PASSWORD
 * @property string $EMAIL
 * @property string $ROLE
 * @property string $FIO
 *
 * @property EVENTS $Events
 * @property FILES[] $Files
 * @property TICKETS[] $Tickets
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'USERS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USERNAME', 'PASSWORD', 'EMAIL', 'ROLE'], 'required'],
            [['USERNAME', 'PASSWORD', 'EMAIL'], 'string', 'max' => 255],
            [['ROLE'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_USER' => 'Код пользователя',
            'USERNAME' => 'Имя пользователя',
            'PASSWORD' => 'Пароль',
            'FIO' => 'ФИО',
            'EMAIL' => 'Адрес электронной почты',
            'ROLE' => 'Роль пользователя',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Events::className(), ['FID_USER' => 'ID_USER']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(FILES::className(), ['FID_USER' => 'ID_USER']);
    }

    public static function findIdentity($id)
    {
        return !empty(self::findOne(['ID_USER'=>$id])) ? new static(self::findOne(['ID_USER'=>$id])) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::find(['USERNAME'=>$username])->one();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->ID_USER;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return true;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->PASSWORD === md5($password);
    }


}
