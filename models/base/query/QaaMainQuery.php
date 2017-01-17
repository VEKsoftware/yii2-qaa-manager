<?php

namespace vekqaam\models\base\query;

/**
 * This is the ActiveQuery class for [[\vekqaam\models\base\QaaMain]].
 *
 * @see \vekqaam\models\base\QaaMain
 */
class QaaMainQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \vekqaam\models\base\QaaMain[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \vekqaam\models\base\QaaMain|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
