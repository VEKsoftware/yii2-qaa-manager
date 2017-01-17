<?php

namespace vekqaam\models;

use vekqaam\models\base\QaaMainBase;
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
}
