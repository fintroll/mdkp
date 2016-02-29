<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVENTS".
 *
 * @property integer $ID_EVENT
 * @property integer $FID_TICKET
 * @property integer $FID_USER
 * @property string $TIME_EVENT
 * @property string $DESCRIPTION
 * @property integer $IS_SENT
 *
 * @property TICKETS $fIDTICKET
 * @property USERS $fIDUSER
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EVENTS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FID_TICKET', 'FID_USER', 'DESCRIPTION'], 'required'],
            [['FID_TICKET', 'FID_USER', 'IS_SENT'], 'integer'],
            [['TIME_EVENT'], 'safe'],
            [['DESCRIPTION'], 'string'],
            [['FID_USER'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_EVENT' => 'Код события',
            'FID_TICKET' => 'Код заявки',
            'FID_USER' => 'Код пользователя',
            'TIME_EVENT' => 'Дата события',
            'DESCRIPTION' => 'Событие',
            'IS_SENT' => 'Флаг отправки',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicket()
    {
        return $this->hasOne(Tickets::className(), ['ID_TICKET' => 'FID_TICKET']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['ID_USER' => 'FID_USER']);
    }
}
