<?php

namespace vekqaam\models;

use Yii;
use yii\base\InvalidParamException;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vekqaam\models\base\QaaMainBase;

/**
 * QaaMainSearch represents the model behind the search form about `vekqaam\models\base\QaaMainBase`.
 */
class QaaMainSearch extends QaaMainBase
{
    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'op_lock'], 'integer'],
            [['title', 'text', 'created_at', 'updated_at'], 'safe'],
            [['isHidden'], 'boolean'],
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
        $query = QaaMainBase::find();

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
            'category_id' => $this->category_id,
            'isHidden' => $this->isHidden,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'op_lock' => $this->op_lock,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
