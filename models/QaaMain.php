<?php

namespace vekqaam\models;

use vekqaam\models\base\QaaMainBase;
use Yii;

/**
 * Created by PhpStorm.
 * User: dolgikh
 * Date: 17.01.17
 * Time: 12:01
 */
class QaaMain extends QaaMainBase
{
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
