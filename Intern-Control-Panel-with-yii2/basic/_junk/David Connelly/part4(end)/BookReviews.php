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
    public function rules()  //default scenario
    {
        return [
            [['book_title', 'author', 'amazon_url', 'review'], 'required'],
            [['review'], 'string'],
            [['book_title', 'author', 'amazon_url'], 'string', 'max' => 255],
            [['amazon_url'],'url','defaultScheme'=>'https','message'=>'This is not a valid url!'],
          //  [['book_title'],'unique'], // for ajax validation
           // [['book_title'],'validateTitle','params'=>['myauthor'=>'author']] -> custom validators
            [['image'],'required','on'=>'update-image','message'=>'Enter Image.(From Update-Image Scenario)'], // image sadece update-image senaryosunda required
        ];
    }

    // (advance) custom validators
    public function validateTitle($attribute,$params)
    {
        $book_title=$this->$attribute;

      /* custom validators 
        $author=$this->$params['myauthor'];
        if(($book_title=='Ilker') && ($author=='Ali')){
            $this->addError($attribute,'You can not write Ilker Ali!');
        }*/   

        //advanced custom validation -> custom SQL query 
        
        $connection=Yii::$app->db;
        $query="select * from book_reviews where book_title='$book_title'";
        $book_reviews=$connection->createCommand($query)->queryAll();
        
        if($book_reviews){
            $this->addError($attribute,"There are already a book with the title of ".$book_title.".");
        }else{
            $this->addError($attribute,"There are no book at the title of ".$book_title.".");
        }
        
    }
    
    public function scenarios(){

        $scenarios=parent::scenarios();
        $scenarios['update-image']=['image'];  //senaryonun adini update-image ve 'image'e etki ediyor
        return $scenarios;

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
