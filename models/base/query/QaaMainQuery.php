<?php

namespace vekqaam\models\base\query;

use vekqaam\models\base\QaaMainBase;
use yii\db\ActiveQuery;
use yii\db\Connection;

/**
 * This is the ActiveQuery class for [[QaaMainBase]].
 *
 * @see QaaMainBase
 */
class QaaMainQuery extends ActiveQuery
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
     * @return QaaMainBase[]|array
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
     * @return QaaMainBase|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
