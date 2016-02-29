<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "D_STATUSES".
 *
 * @property integer $ID_STATUS
 * @property string $NAME_STATUS
 * @property integer $IS_FINAL
 *
 * @property Tickets[] $Tickets
 */
class Statuses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'D_STATUSES';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME_STATUS', 'IS_FINAL'], 'required'],
            [['IS_FINAL'], 'integer'],
            [['NAME_STATUS'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_STATUS' => 'Код статуса',
            'NAME_STATUS' => 'Статус',
            'IS_FINAL' => 'Флаг конечного статуса',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(TICKETS::className(), ['FID_CATEGORY' => 'ID_CATEGORY']);
    }
}
