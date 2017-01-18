<?php

namespace vekqaam\models;

use vekqaam\models\base\QaaMainBase;
use vekqaam\models\base\query\QaaMainQuery;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Created by PhpStorm.
 * User: dolgikh
 * Date: 17.01.17
 * Time: 12:01
 */
class QaaMain extends QaaMainBase
{
    /**
     * Поведение
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ]
        ];
    }

    /**
     * Оптимистическая блокировка
     *
     * @return string
     */
    public function optimisticLock()
    {
        return 'op_lock';
    }

    /**
     * Имя категории
     *
     * @return string
     */
    public function getCategoryName()
    {
        return $this->category->name;
    }

    /**
     * Список для DD поля isHidden
     *
     * @return array
     */
    public static function getIsHiddenDropDownList()
    {
        return [
            0 => Yii::t('vekqaam', 'No'),
            1 => Yii::t('vekqaam', 'Yes'),
        ];
    }

    /**
     * Получаем весь блок по категории
     *
     * @param string|array $condition - Условия для запроса
     *
     * @return QaaMainQuery
     */
    public static function getCategoryBlock($condition)
    {
        $selectCondition = static::tableName() . '.*';

        return static::find()
            ->select($selectCondition)
            ->joinWith('category')
            ->where($condition);
    }

    /**
     * Получаем Количество элементов в блоке
     *
     * @param string|array $condition - Условия для запроса
     *
     * @return int|string
     */
    public static function getCategoryBlockCount($condition)
    {
        return static::getCategoryBlock($condition)->count();
    }
}
