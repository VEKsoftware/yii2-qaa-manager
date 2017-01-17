<?php

namespace vekqaam\models\base;

use Yii;

/**
 * This is the model class for table "qaa_main".
 *
 * @property integer         $id
 * @property integer         $category_id
 * @property string          $title
 * @property string          $text
 * @property boolean         $isHidden
 * @property string          $created_at
 * @property string          $updated_at
 * @property integer         $op_lock
 *
 * @property QaaCategoryBase $category
 */
class QaaMainBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'qaa_main';
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
            [['category_id', 'title', 'text'], 'required'],
            [['category_id', 'op_lock'], 'integer'],
            [['title', 'text'], 'string'],
            [['isHidden'], 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => QaaCategoryBase::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('vekqaam', 'ID'),
            'category_id' => Yii::t('vekqaam', 'Category ID'),
            'title' => Yii::t('vekqaam', 'Title'),
            'text' => Yii::t('vekqaam', 'Text'),
            'isHidden' => Yii::t('vekqaam', 'Is Hidden'),
            'created_at' => Yii::t('vekqaam', 'Created At'),
            'updated_at' => Yii::t('vekqaam', 'Updated At'),
            'op_lock' => Yii::t('vekqaam', 'Op Lock'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(QaaCategoryBase::className(), ['id' => 'category_id']);
    }

    /**
     * @inheritdoc
     * @return \vekqaam\models\base\query\QaaMainQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \vekqaam\models\base\query\QaaMainQuery(get_called_class());
    }
}
