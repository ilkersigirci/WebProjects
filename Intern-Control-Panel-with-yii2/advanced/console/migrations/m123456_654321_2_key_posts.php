<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_2_key_posts
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_2_key_posts extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%posts}}', 'post_id');
        $this->runSuccess['addAutoIncrement'] = $this->addAutoIncrement('{{%posts}}', 'post_id', 'integer', '', 2);

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
                $this->dropPrimaryKey(null, '{{%posts}}');
            } elseif (!empty($keyName)) {
                $this->dropIndex("`$keyName`", '{{%posts}}');
            }
        }

    }
}
