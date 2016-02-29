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
 *
 * @property EVENTS $Events
 * @property FILES[] $Files
 * @property TICKETS[] $Tickets
 */
class Users extends \yii\db\ActiveRecord
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


}
