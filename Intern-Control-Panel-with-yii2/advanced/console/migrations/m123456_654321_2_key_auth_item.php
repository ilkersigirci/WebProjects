<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_2_key_auth_item
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_2_key_auth_item extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%auth_item}}', 'name');
        $this->runSuccess['rule_name'] = $this->createIndex('rule_name', '{{%auth_item}}', 'rule_name', 0);
        $this->runSuccess['idx-auth_item-type'] = $this->createIndex('idx-auth_item-type', '{{%auth_item}}', 'type', 0);

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
                $this->dropPrimaryKey(null, '{{%auth_item}}');
            } elseif (!empty($keyName)) {
                $this->dropIndex("`$keyName`", '{{%auth_item}}');
            }
        }

    }
}
