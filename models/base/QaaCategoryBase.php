<?php

namespace vekqaam\models\base;

use vekqaam\models\base\query\QaaCategoryQuery;
use vekqaam\QaaManager;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\Connection;

/**
 * This is the model class for table "qaa_category".
 *
 * @property integer       $id
 * @property string        $name
 * @property string        $created_at
 * @property string        $updated_at
 * @property integer       $op_lock
 *
 * @property QaaMainBase[] $qaaMains
 */
class QaaCategoryBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public static function tableName()
    {
        return 'qaa_category';
    }

    /**
     * {@inheritdoc}
     *
     * @return Connection the database connection used by this AR class.
     *
     * @throws InvalidConfigException
     */
    public static function getDb()
    {
        $module = QaaManager::getInstance();

        return Yii::$app->get($module->db);
    }

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['op_lock'], 'integer'],
            [['name'], 'string', 'max' => 30],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('vekqaam', 'ID'),
            'name' => Yii::t('vekqaam', 'Name'),
            'created_at' => Yii::t('vekqaam', 'Created At'),
            'updated_at' => Yii::t('vekqaam', 'Updated At'),
            'op_lock' => Yii::t('vekqaam', 'Op Lock'),
        ];
    }

    /**
     * Связь с Main
     *
     * @return ActiveQuery
     */
    public function getQaaMains()
    {
        return $this->hasMany(QaaMainBase::className(), ['category_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     *
     * @return QaaCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new QaaCategoryQuery(get_called_class());
    }
}
