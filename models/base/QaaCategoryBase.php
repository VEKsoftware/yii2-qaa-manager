<?php

namespace vekqaam\models\base;

use Yii;

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
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'qaa_category';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbPublic');
    }

    /**
     * @inheritdoc
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
     * @inheritdoc
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
     * @return \yii\db\ActiveQuery
     */
    public function getQaaMains()
    {
        return $this->hasMany(QaaMainBase::className(), ['category_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \vekqaam\models\base\query\QaaCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \vekqaam\models\base\query\QaaCategoryQuery(get_called_class());
    }
}
