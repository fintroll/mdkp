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

    public function getImage($id)
    {
        switch ($id) {
            case 1 :
                return 'gavel';
            case 2 :
                return 'bug_report';
            case 3 :
                return 'lightbulb_outline';
            case 4 :
                return 'language';
            case 5 :
                return 'ac_unit';
            case 6 :
                return 'add_shopping_cart';
            case 7 :
                return 'build';
            case 8 :
                return 'account_balance_wallet';
            default :
                return 'business';
        }

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(TICKETS::className(), ['FID_CATEGORY' => 'ID_CATEGORY']);
    }
}
