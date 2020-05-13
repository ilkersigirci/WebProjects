<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $company_name
 * @property int $tax_number
 * @property int $employee_number
 */
class Company extends \yii\db\ActiveRecord
{
    public $employee;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_name', 'tax_number', 'employee_number'], 'required'],
            [['tax_number', 'employee_number'], 'integer'],
            [['company_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Company Name',
            'tax_number' => 'Tax Number',
            'employee_number' => 'Employee Number',
            'employee'=>'Employee',
        ];
    }
}
