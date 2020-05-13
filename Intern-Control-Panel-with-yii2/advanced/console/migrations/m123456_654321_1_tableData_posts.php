<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_1_tableData_posts
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_1_tableData_posts extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%posts}}', 
            ['post_id', 'company_name', 'post_name', 'description'],
            [
                [1, 'simlab', 'first commit', 'this is the demo post'],
            ]
        );
        $this->_transaction->commit();

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        $this->_transaction->rollBack();

    }
}
