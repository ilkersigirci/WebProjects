<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_1_tableData_auth_item
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_1_tableData_auth_item extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%auth_item}}', 
            ['name', 'type', 'description', 'rule_name', 'data', 'created_at', 'updated_at'],
            [
                ['admin', 1, 'admin can do everything', null, null, null, null],
                ['asdfadf', 1, '', null, null, null, null],
                ['create-company', 1, 'allow a user to create a company', null, null, null, null],
                ['create-post', 1, 'allow a user to create post', null, null, null, null],
                ['user', 1, 'user have restricted permissions', null, null, null, null],
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
