<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "D_CATEGORIES".
 *
 * @property integer $ID_CATEGORY
 * @property string $NAME_CATEGORY
 *
 * @property Tickets[] $Tickets
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'D_CATEGORIES';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME_CATEGORY'], 'required'],
            [['NAME_CATEGORY'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_CATEGORY' => 'Код категории',
            'NAME_CATEGORY' => 'Категория',
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
