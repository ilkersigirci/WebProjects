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
 * @property string $review
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
            [['book_title', 'author', 'amazon_url', 'review'], 'required'],
            [['review'], 'string'],
            [['book_title', 'author', 'amazon_url'], 'string', 'max' => 255],
            ['amazon_url','url','defaultScheme'=>'https','message'=>'This is not a valid url!'],
            ['book_title','unique'],
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
            'review' => 'Your Review',
        ];
    }
}
