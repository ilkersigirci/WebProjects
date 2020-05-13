<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_1_tableData_company
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_1_tableData_company extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%company}}', 
            ['id', 'company_name', 'tax_number', 'employee_number'],
            [
                [1, 'SImLab', 123456789, 4],
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
