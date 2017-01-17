<?php

namespace vekqaam\models\base\query;

use vekqaam\models\base\QaaCategoryBase;
use yii\db\ActiveQuery;
use yii\db\Connection;

/**
 * This is the ActiveQuery class for [[QaaCategoryBase]].
 *
 * @see QaaCategoryBase
 */
class QaaCategoryQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     *
     * @param Connection $db the DB connection used to create the DB command.
     *
     * @return QaaCategoryBase[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     *
     * @param Connection $db the DB connection used to create the DB command.
     *
     * @return QaaCategoryBase|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
