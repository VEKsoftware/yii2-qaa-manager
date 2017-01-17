<?php

namespace vekqaam\models\base\query;

/**
 * This is the ActiveQuery class for [[\vekqaam\models\base\QaaCategory]].
 *
 * @see \vekqaam\models\base\QaaCategory
 */
class QaaCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \vekqaam\models\base\QaaCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \vekqaam\models\base\QaaCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
