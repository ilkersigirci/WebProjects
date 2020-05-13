<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_0_table_user_company
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_0_table_user_company extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%user_company}}', [
            'id' => $this->integer(64)->notNull(),
            'user_id' => $this->integer(64)->notNull(),
            'company_id' => $this->integer(64)->notNull(),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%user_company}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%user_company}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
