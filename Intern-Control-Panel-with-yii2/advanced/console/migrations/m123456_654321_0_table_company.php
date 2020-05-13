<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_0_table_company
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_0_table_company extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%company}}', [
            'id' => $this->integer(255)->notNull(),
            'company_name' => $this->string(255)->notNull(),
            'tax_number' => $this->integer(255)->notNull(),
            'employee_number' => $this->integer(255)->notNull(),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%company}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%company}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
