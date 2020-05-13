<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book_reviews".
 *
 * @property int $id
 * @property string $book_title
 * @property string $author
 * @property string $amazon_url
 */
class BookReviews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book_reviews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_title', 'author', 'amazon_url'], 'required'],
            [['book_title', 'author', 'amazon_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_title' => 'Book Title',
            'author' => 'Author',
            'amazon_url' => 'Amazon Url',
        ];
    }
}
