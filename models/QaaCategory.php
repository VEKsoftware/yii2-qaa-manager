<?php

namespace vekqaam\models;

use vekqaam\models\base\QaaCategoryBase;

class QaaCategory extends QaaCategoryBase
{
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
