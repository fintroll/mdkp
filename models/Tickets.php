<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TICKETS".
 *
 * @property integer $ID_TICKET
 * @property string $SUBJECT
 * @property string $DESCRIPTION
 * @property integer $FID_CATEGORY
 * @property integer $FID_CREATOR
 * @property integer $FID_PERFORMER
 * @property integer $FID_STATUS
 * @property string $TIME_CREATE
 * @property string $TIME_UPDATE
 *
 * @property Events[] $Events
 * @property Files[] $Files
 * @property Categories $Category
 * @property Users $Creator
 * @property Users $Performer
 * @property Statuses $Status
 */
class Tickets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TICKETS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SUBJECT', 'DESCRIPTION', 'FID_CATEGORY', 'FID_CREATOR', 'FID_PERFORMER', 'FID_STATUS'], 'required'],
            [['DESCRIPTION'], 'string'],
            [['FID_CATEGORY', 'FID_CREATOR', 'FID_PERFORMER', 'FID_STATUS'], 'integer'],
            [['TIME_CREATE', 'TIME_UPDATE'], 'safe'],
            [['SUBJECT'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_TICKET' => 'Код заявки',
            'SUBJECT' => 'Тема',
            'DESCRIPTION' => 'Текст заявки',
            'FID_CATEGORY' => 'Код категории',
            'FID_CREATOR' => 'Код заявителя',
            'FID_PERFORMER' => 'Код исполнителя',
            'FID_STATUS' => 'Статус',
            'TIME_CREATE' => 'Дата создания',
            'TIME_UPDATE' => 'Дата изменения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Events::className(), ['FID_TICKET' => 'ID_TICKET']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(Files::className(), ['FID_TICKET' => 'ID_TICKET']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['ID_CATEGORY' => 'FID_CATEGORY']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(Users::className(), ['ID_USER' => 'FID_CREATOR']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerformer()
    {
        return $this->hasOne(Users::className(), ['ID_USER' => 'FID_PERFORMER']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Statuses::className(), ['ID_STATUS' => 'FID_STATUS']);
    }
}
