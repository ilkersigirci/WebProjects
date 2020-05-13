<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_3_FK_user_company
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_3_FK_user_company extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $tablePrefix = \Yii::$app->getDb()->tablePrefix;
        $this->runSuccess[$tablePrefix.'user_company_ibfk_1'] = $this->addForeignKey($tablePrefix.'user_company_ibfk_1', '{{%user_company}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->runSuccess[$tablePrefix.'user_company_ibfk_2'] = $this->addForeignKey($tablePrefix.'user_company_ibfk_2', '{{%user_company}}', 'company_id', '{{%company}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            $this->dropForeignKey($keyName, '{{%user_company}}');
        }

    }
}
