<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_2_key_user_company
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_2_key_user_company extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%user_company}}', 'id');
        $this->runSuccess['addAutoIncrement'] = $this->addAutoIncrement('{{%user_company}}', 'id', 'integer', '', 2);
        $this->runSuccess['user_id'] = $this->createIndex('user_id', '{{%user_company}}', 'user_id', 0);
        $this->runSuccess['company_id'] = $this->createIndex('company_id', '{{%user_company}}', 'company_id', 0);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('addAutoIncrement' === $keyName) {
                continue;
            } elseif ('PRIMARY' === $keyName) {
                // must be remove auto_increment before drop primary key
                if (isset($this->runSuccess['addAutoIncrement'])) {
                    $value = $this->runSuccess['addAutoIncrement'];
                    $this->dropAutoIncrement("{$value['table_name']}", $value['column_name'], $value['column_type'], $value['property']);
                }
                $this->dropPrimaryKey(null, '{{%user_company}}');
            } elseif (!empty($keyName)) {
                $this->dropIndex("`$keyName`", '{{%user_company}}');
            }
        }

    }
}
