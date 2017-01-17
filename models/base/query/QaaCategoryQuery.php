<?php

namespace vekqaam\models\base\query;

/**
 * This is the ActiveQuery class for [[\vekqaam\models\base\QaaCategoryBase]].
 *
 * @see \vekqaam\models\base\QaaCategoryBase
 */
class QaaCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \vekqaam\models\base\QaaCategoryBase[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \vekqaam\models\base\QaaCategoryBase|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
