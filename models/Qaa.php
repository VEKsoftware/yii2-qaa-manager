<?php

namespace vekqaam\models;

use Yii;
use yii\base\ErrorException;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class Qaa extends Model
{
    /**
     * Категория(и)
     *
     * @var string|array
     */
    public $category;

    /**
     * Условия для запроса
     *
     * @var string|array
     */
    public $queryCondition = [];

    /**
     * Конфигурация провайдера
     *
     * @var array
     */
    public $providerConfig = [];

    /**
     * {@inheritdoc}
     *
     * @return void
     *
     * @throws \yii\base\ErrorException
     */
    public function init()
    {
        if (empty($this->category) || !(is_string($this->category) || is_array($this->category))) {
            throw new ErrorException(Yii::t('vekqaam', 'Category not defined or not correct'));
        }

        if (!(is_string($this->queryCondition) || is_array($this->queryCondition))) {
            throw new ErrorException(Yii::t('vekqaam', 'Query condition defined not correct'));
        }

        if (!is_array($this->providerConfig)) {
            throw new ErrorException(Yii::t('vekqaam', 'Provider config condition defined not correct'));
        }
    }

    /**
     * Получаем провайдер для категории
     *
     * @return ActiveDataProvider
     */
    public function categoryProvider()
    {
        return new ActiveDataProvider($this->providerFinalConfig());
    }

    /**
     * Стандартная конфигурация провайдера
     *
     * @return array
     */
    protected function providerDefaultConfig()
    {
        return [
            'query' => QaaMain::getCategoryBlock($this->queryFinalCondition()),
            'pagination' => [
                'pageSize' => QaaMain::getCategoryBlockCount($this->queryFinalCondition())
            ]
        ];
    }

    /**
     * Стандартная конфигурация провайдера
     *
     * @return array
     */
    protected function providerFinalConfig()
    {
        return ArrayHelper::merge($this->providerDefaultConfig(), $this->providerConfig);
    }

    /**
     * Получаем финальную конфигурацию условий для запроса
     *
     * @return array
     */
    protected function queryFinalCondition()
    {
        return [
            'and',
            ArrayHelper::merge(
                [QaaCategory::tableName() . '.name' => $this->category],
                $this->queryCondition
            )
        ];
    }
}
