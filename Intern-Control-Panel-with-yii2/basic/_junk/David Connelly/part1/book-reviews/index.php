<h1>This is from index.php in views</h1>
<hr>

<h3>Book Reviews List</h3>

<table class="table table-striped">

    <tr>
        <th>Book Title</th>
        <th>Author</th>
        <th>Action</th>
    </tr>

    <?php
    foreach($booksList as $book){
        $id=$book['id'];
    ?>
    
    <tr>
        <td><?=$book['book_title']?></td>
        <td><?=$book['author']?></td>
        <td><a href="/book-reviews/view?id=<?= $id ?>">
        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
        View</a></td>
    </tr>
    <?php
    }
    ?>
</table>

<?php
    $data['yourName']="";
    echo $this->render('_advert',$data);  
    //echo $this->context->renderPartial('_advert',$data);   /*alternative to above code */
?>

