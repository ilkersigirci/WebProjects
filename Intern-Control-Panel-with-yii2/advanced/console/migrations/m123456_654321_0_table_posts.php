<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_0_table_posts
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_0_table_posts extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%posts}}', [
            'post_id' => $this->integer(11)->notNull(),
            'company_name' => $this->string(100)->notNull(),
            'post_name' => $this->string(100)->notNull(),
            'description' => $this->string(500)->null(),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%posts}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%posts}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
