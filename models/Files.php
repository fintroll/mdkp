<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "FILES".
 *
 * @property integer $ID_FILE
 * @property string $FILENAME
 * @property string $FILEPATH
 * @property string $EXTENSION
 * @property string $UPLOAD_TIME
 * @property integer $FID_TICKET
 * @property integer $FID_USER
 *
 * @property Tickets $Ticket
 * @property Users $User
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'FILES';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FILENAME', 'FILEPATH', 'EXTENSION', 'FID_TICKET', 'FID_USER'], 'required'],
            [['UPLOAD_TIME'], 'safe'],
            [['FID_TICKET', 'FID_USER'], 'integer'],
            [['FILENAME', 'FILEPATH'], 'string', 'max' => 255],
            [['EXTENSION'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_FILE' => 'Код файла',
            'FILENAME' => 'Имя файла',
            'FILEPATH' => 'Относительный путь файла',
            'EXTENSION' => 'Расширение файла',
            'UPLOAD_TIME' => 'Дата загрузки',
            'FID_TICKET' => 'Код заявки',
            'FID_USER' => 'Код пользователя',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicket()
    {
        return $this->hasOne(TICKETS::className(), ['ID_TICKET' => 'FID_TICKET']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(USERS::className(), ['ID_USER' => 'FID_USER']);
    }
}
