<?php
namespace backend\models;

use yii\base\Model;
use common\models\User;
use backend\models\AuthAssignment; // for adding permissions

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $permissions;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        
        // for adding permissions
        $user->save();
        $permissionList=$_POST['SignupForm']['permissions'];
        
        foreach ($permissionList as $value) {
            $newPermission=new AuthAssignment;
            $newPermission->user_id=$user->id;
            $newPermission->item_name=$value;
            $newPermission->save();
            /* print_r($newPermission->getErrors());  for error reporting
            die(); */
            
        }return $user;


        //return $user->save() ? $user : null;  ORIGINAL



    }
}
