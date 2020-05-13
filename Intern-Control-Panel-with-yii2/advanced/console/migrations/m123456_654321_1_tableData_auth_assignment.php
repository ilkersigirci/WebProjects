<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_1_tableData_auth_assignment
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_1_tableData_auth_assignment extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%auth_assignment}}', 
            ['item_name', 'user_id', 'created_at'],
            [
                ['admin', 3, null],
                ['user', 4, null],
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
