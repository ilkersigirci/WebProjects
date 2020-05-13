<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_2_key_auth_assignment
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_2_key_auth_assignment extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%auth_assignment}}', 'item_name,user_id');
        $this->runSuccess['auth_assignment_user_id_idx'] = $this->createIndex('auth_assignment_user_id_idx', '{{%auth_assignment}}', 'user_id', 0);

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
                $this->dropPrimaryKey(null, '{{%auth_assignment}}');
            } elseif (!empty($keyName)) {
                $this->dropIndex("`$keyName`", '{{%auth_assignment}}');
            }
        }

    }
}
