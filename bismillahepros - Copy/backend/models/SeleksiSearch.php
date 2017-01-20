<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Proposal;

/**
 * ProposalSearch represents the model behind the search form of `backend\models\Proposal`.
 */
class SeleksiSearch extends Proposal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idproposal'], 'integer'],
            [['dari', 'ke', 'file', 'level', 'status'], 'safe'],
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
    public function getStatus(){

    }

    public function search($params)
    {
        $query = Proposal::find()->where(['status' => 0]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idproposal' => $this->idproposal,
        ]);

        $query->andFilterWhere(['like', 'dari', $this->dari])
            ->andFilterWhere(['like', 'ke', $this->ke])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
