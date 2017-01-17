<?php

namespace vekqaam\models;

use vekqaam\models\base\QaaCategoryBase;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class QaaCategory extends QaaCategoryBase
{
    /**
     * Поведение
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            array(
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            )
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
     * Получаем список категорий для DropDown
     *
     * @return array
     */
    public static function getCategoryDropDownList()
    {
        return static::find()
            ->select(['name'])
            ->indexBy('id')
            ->column();
    }
}
