<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $post_id
 * @property string $company_name
 * @property string $post_name
 * @property string $description
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_name', 'post_name'], 'required'],
            [['company_name', 'post_name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'company_name' => 'Company Name',
            'post_name' => 'Post Name',
            'description' => 'Description',
        ];
    }
}
