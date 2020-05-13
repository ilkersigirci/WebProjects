<?php

    namespace app\controllers;
    use Yii;
    use yii\web\Controller;

    class BookReviewsController extends Controller
    {
        //FLow of Data...
        //Controller -> Template -> View
        /* 
        public function actionIndex()
        {
            //echo "This text is a normal echo from BookReviewsController.php";
            $data['name']="Ilker";
            $data['age']="21";
            return $this->render('hello',$data);  //hello.php de oluyor
        }

        public function actionAnotherPage()
        {
            $this->layout = "another_layout";   
            $data['name']="Ilker";
            $data['age']="21";
            return $this->render('hello',$data); 
        }
        */
        public function actionIndex()
        {
            $data['booksList']=$this->actionGetBooksList();
            /*$count=0;
            foreach ($data['booksList'] as $book) {
                $count++;
                echo "book".$count."<br>";
            }*/            
            return $this->render('index',$data); 
        }

        public function actionView($id)  // nereden aliyor bu $id'i
        {
            $data['idd']=$id;  //Bu data ile ustteki data tamamen farkli

            $booksList=$this->actionGetBooksList();
            foreach($booksList as $book){
                if($id==$book['id']){
                    $data['book_title']=$book['book_title'];
                    $data['author']=$book['author'];
                    $data['amazon_url']=$book['amazon_url'];
                }
            }
            
            
            return $this->render('view',$data); 
        }

        public function actionGetBooksList()
        {
            $booksList=[

                ['id'=>1,'book_title'=>'Some Title1','author'=>'The author1','amazon_url'=>'http://www.amazon.com'],
                ['id'=>3,'book_title'=>'Some Title2','author'=>'The author2','amazon_url'=>'http://www.amazon.com'],
                ['id'=>5,'book_title'=>'Some Title3','author'=>'The author3','amazon_url'=>'http://www.amazon.com']

            ];

            return $booksList;
        }





        
    }

?>

