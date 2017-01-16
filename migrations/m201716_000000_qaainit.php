<?php

use qaa\QaaManager;
use yii\db\Migration;

class m201716_000000_qaainit extends Migration
{
    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function init()
    {
        $module = QaaManager::getInstance();

        $this->db = $module->db;
        parent::init();
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function safeUp()
    {
        $this->createTable(
            '{{%qaa_category}}',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(30)->unique()->notNull(),
                'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
                'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
                'op_lock' => $this->bigInteger()->notNull()->defaultValue(0)
            ]
        );

        $this->createTable(
            '{{%qaa_main}}',
            [
                'id' => $this->primaryKey(),
                'category_id' => $this->integer()->notNull(),
                'title' => $this->text()->notNull(),
                'text' => $this->text()->notNull(),
                'isHidden' => $this->boolean()->defaultValue(false)->notNull(),
                'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
                'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
                'op_lock' => $this->bigInteger()->notNull()->defaultValue(0)
            ]
        );

        $this->addForeignKey(
            'fk_qaa_main_category_id_qaa_category_id',
            '{{%qaa_main}}',
            'category_id',
            '{{%qaa_category}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex('ix_qaa_main_category_id', '{{%qaa_main}}', 'category_id');
        $this->createIndex('ix_qaa_main_title', '{{%qaa_main}}', 'title');
        $this->createIndex('ix_qaa_main_text', '{{%qaa_main}}', 'text');
        $this->createIndex('ix_qaa_main_is_hidden', '{{%qaa_main}}', 'isHidden');
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function safeDown()
    {
        $this->dropTable('{{%qaa_main}}');
        $this->dropTable('{{%qaa_category}}');
    }
}
