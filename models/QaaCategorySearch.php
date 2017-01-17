<?php

namespace vekqaam\models;

use yii\base\InvalidParamException;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vekqaam\models\QaaCategory;

/**
 * QaaCategorySearch represents the model behind the search form about `QaaCategory`.
 */
class QaaCategorySearch extends QaaCategory
{
    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name'], 'string'],
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
        $query = QaaCategory::find();

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
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
