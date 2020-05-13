<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_2_key_user
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_2_key_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%user}}', 'id');
        $this->runSuccess['addAutoIncrement'] = $this->addAutoIncrement('{{%user}}', 'id', 'integer', '', 6);
        $this->runSuccess['username'] = $this->createIndex('username', '{{%user}}', 'username', 1);
        $this->runSuccess['email'] = $this->createIndex('email', '{{%user}}', 'email', 1);
        $this->runSuccess['password_reset_token'] = $this->createIndex('password_reset_token', '{{%user}}', 'password_reset_token', 1);

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
                $this->dropPrimaryKey(null, '{{%user}}');
            } elseif (!empty($keyName)) {
                $this->dropIndex("`$keyName`", '{{%user}}');
            }
        }

    }
}
