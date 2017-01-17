<?php

namespace vekqaam\models;

use Yii;
use yii\base\InvalidParamException;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vekqaam\models\base\QaaCategoryBase;

/**
 * QaaCategorySearch represents the model behind the search form about `vekqaam\models\base\QaaCategoryBase`.
 */
class QaaCategorySearch extends QaaCategoryBase
{
    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['id', 'op_lock'], 'integer'],
            [['name', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params - параметры
     *
     * @return ActiveDataProvider
     *
     * @throws InvalidParamException
     */
    public function search($params)
    {
        $query = QaaCategoryBase::find();

        // Add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // Uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // Grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'op_lock' => $this->op_lock,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
