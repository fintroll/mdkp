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
            [['SUBJECT', 'DESCRIPTION', 'TIME_CREATE', 'TIME_UPDATE'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
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

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID_TICKET' => $this->ID_TICKET,
            'FID_CATEGORY' => $this->FID_CATEGORY,
            'FID_CREATOR' => $this->FID_CREATOR,
            'FID_PERFORMER' => $this->FID_PERFORMER,
            'FID_STATUS' => $this->FID_STATUS,
            'TIME_CREATE' => $this->TIME_CREATE,
            'TIME_UPDATE' => $this->TIME_UPDATE,
        ]);

        $query->andFilterWhere(['like', 'SUBJECT', $this->SUBJECT])
            ->andFilterWhere(['like', 'DESCRIPTION', $this->DESCRIPTION]);

        return $dataProvider;
    }
}
