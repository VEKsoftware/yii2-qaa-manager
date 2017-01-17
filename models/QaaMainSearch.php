<?php

namespace vekqaam\models;

use yii\base\InvalidParamException;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vekqaam\models\QaaMain;

/**
 * QaaMainSearch represents the model behind the search form about `QaaMain`.
 */
class QaaMainSearch extends QaaMain
{
    /**
     * Наименование категории
     *
     * @var string
     */
    public $categoryName;

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'text', 'categoryName'], 'string'],
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
        $query = QaaMain::find()->joinWith('category');

        // Add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'categoryName' => [
                    'asc' => ['category.name' => SORT_ASC],
                    'desc' => ['category.name' => SORT_DESC],
                ],
                'title',
                'text',
                'isHidden',
                'created_at',
                'updated_at'
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // Uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // Grid filtering conditions
        $query->andFilterWhere([
            QaaMain::tableName() . '.id' => $this->id,
            QaaMain::tableName() . '.isHidden' => $this->isHidden,
        ]);

        $query->andFilterWhere(['like', QaaMain::tableName() . '.title', $this->title])
            ->andFilterWhere(['like', QaaMain::tableName() . '.text', $this->text])
            ->andFilterWhere(['like', QaaCategory::tableName() . '.name', $this->categoryName]);

        return $dataProvider;
    }
}
