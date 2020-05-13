<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_1_tableData_auth_item_child
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_1_tableData_auth_item_child extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%auth_item_child}}', 
            ['parent', 'child'],
            [
                ['admin', 'create-company'],
                ['admin', 'user'],
                ['user', 'create-post'],
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
