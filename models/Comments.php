<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "COMMENTS".
 *
 * @property integer $ID_COMMENT
 * @property string $TEXT
 * @property integer $FID_TICKET
 * @property integer $FID_USER
 * @property string $TIME_CREATE
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'COMMENTS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TEXT', 'FID_TICKET', 'FID_USER'], 'required'],
            [['TEXT'], 'string'],
            [['FID_TICKET', 'FID_USER'], 'integer'],
            [['TIME_CREATE'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_COMMENT' => 'Код комментария',
            'TEXT' => 'Содержание',
            'FID_TICKET' => 'Код заявки',
            'FID_USER' => 'Код пользователя',
            'TIME_CREATE' => 'Дата создания',
        ];
    }

    public function getCreator()
    {
        return $this->hasOne(Users::className(), ['ID_USER' => 'FID_USER']);
    }
}
