<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_1_tableData_user
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_1_tableData_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%user}}', 
            ['id', 'username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'status', 'created_at', 'updated_at'],
            [
                [3, 'dev', 'qmBxWainrWPVHUDkQFxO16vCQ3rqi2_1', '$2y$13$H63l1MnMaJPWRPTltfXpbOq4qAYXssBadxBmH6pSqexN.iX3bmziy', null, 'dev@mail.com', 10, 1531296327, 1531296327],
                [4, 'user', 'J9r1h0u0oHEZM7r5L1CAG_aN_pPYKHth', '$2y$13$c.qGecwN2UIxu18y75o8auDe9e13mS02MpUZgpCHzW.FxgaY3EVti', null, 'user@gmail.com', 10, 1531392275, 1531392275],
                [5, 'user2', 'LH0EcBzAY3X4qEIUuwY6MgYYWIEBHc_R', '$2y$13$ooxFwi3ejJYeenDrEWhwneJgnS/WNDdE5R6/Ew8sXYT09pblNsPK2', null, 'user2@gmail.com', 10, 1531399977, 1531399977],
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
