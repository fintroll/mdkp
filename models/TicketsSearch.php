<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tickets;

/**
 * TicketsSearch represents the model behind the search form about `app\models\Tickets`.
 */
class TicketsSearch extends Tickets
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_TICKET', 'FID_CATEGORY', 'FID_CREATOR', 'FID_PERFORMER', 'FID_STATUS'], 'integer'],
            [['SUBJECT', 'DESCRIPTION', 'TIME_CREATE', 'TIME_UPDATE', 'status.NAME_STATUS', 'performer.FIO', 'category.NAME_CATEGORY'], 'safe'],
        ];
    }


    public function attributes()
    {
        return array_merge(parent::attributes(), ['status.NAME_STATUS', 'performer.FIO', 'category.NAME_CATEGORY']);
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {

        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Tickets::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['status.NAME_STATUS'] = [
            'asc' => ['D_STATUSES.NAME_STATUS' => SORT_ASC],
            'desc' => ['D_STATUSES.NAME_STATUS' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['performer.FIO'] = [
            'asc' => ['USERS.FIO' => SORT_ASC],
            'desc' => ['USERS.FIO' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['category.NAME_CATEGORY'] = [
            'asc' => ['D_CATEGORIES.NAME_CATEGORY' => SORT_ASC],
            'desc' => ['D_CATEGORIES.NAME_CATEGORY' => SORT_DESC],
        ];
        $query->joinWith(['category']);
        $query->joinWith(['performer']);
        $query->joinWith(['status']);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID_TICKET' => $this->ID_TICKET,
            'FID_CATEGORY' => $this->FID_CATEGORY,
            'FID_PERFORMER' => $this->FID_PERFORMER,
            'FID_STATUS' => $this->FID_STATUS,

        ]);

        $query->andFilterWhere(['like', 'SUBJECT', $this->SUBJECT])
            ->andFilterWhere(['like', 'DESCRIPTION', $this->DESCRIPTION])
            ->andFilterWhere(['like', 'D_STATUSES.NAME_STATUS', $this->getAttribute('status.NAME_STATUS')])
            ->andFilterWhere(['like', 'D_CATEGORIES.NAME_CATEGORY', $this->getAttribute('category.NAME_CATEGORY')])
            ->andFilterWhere(['like', 'USERS.FIO', $this->getAttribute('performer.FIO')]);

        return $dataProvider;
    }
}
