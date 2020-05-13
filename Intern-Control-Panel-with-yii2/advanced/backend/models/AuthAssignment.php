<?php

namespace backend\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "auth_assignment".
 *
 * @property string $item_name
 * @property string $user_id
 * @property int $created_at
 *
 * @property AuthItem $itemName
 */
class AuthAssignment extends \yii\db\ActiveRecord
{
    public $itemNameIds;
    public $users;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auth_assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_name','user_id'], 'required'],
            [['created_at', 'user_id'], 'integer'],
            [['item_name'], 'string', 'max' => 64],    // user_id originalde buradaydi ve varchardi degeri. PermissionList icin integera gitmesi lazim
            [['item_name', 'user_id'], 'unique', 'targetAttribute' => ['item_name', 'user_id']],
            [['item_name'], 'exist', 'skipOnError' => true, 'targetClass' => AuthItem::className(),
                'targetAttribute' => ['item_name' => 'name']
                
            ],
            /*['itemNameIds', 'each', 'rule' => ['string']],
            ['users', 'each', 'rule' => ['string']],*/
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_name' => 'Item Name',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'itemNameIds' =>'Roles',
            'users' =>'Users',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemName()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'item_name']);
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    
    
    //oktay abi yazdi
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
