<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_1_tableData_user_company
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_1_tableData_user_company extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%user_company}}', 
            ['id', 'user_id', 'company_id'],
            [
                [1, 4, 1],
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
