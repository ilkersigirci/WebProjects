<?php

namespace backend\models;
use common\models\User;

use Yii;

/**
 * This is the model class for table "user_company".
 *
 * @property int $id
 * @property int $user_id
 * @property int $company_id
 *
 * @property User $user
 * @property Company $company
 */
class UserCompany extends \yii\db\ActiveRecord
{

    public $users;
    public $companies;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'company_id'], 'required'],
            [['user_id', 'company_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
            /* ['users', 'each', 'rule' => ['string']],
            ['companies', 'each', 'rule' => ['string']], */
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'company_id' => 'Company ID',
            /* 'users' =>'Users',
            'companies' =>'Companies', */
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }
}
