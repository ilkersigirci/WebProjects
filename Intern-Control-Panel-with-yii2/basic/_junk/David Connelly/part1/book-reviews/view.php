<?php
$this->params['breadcrumbs'][]=['label'=>'Book Reviews','url'=>['/book-reviews']]; // urldeki []'lar butun url'yi kopyalamani sagliyor
$this->params['breadcrumbs'][]=$book_title;
?>

<h1>Review for book ID <?= $idd ?></h1>

<table class="table table-striped table-bordered">
    <tr>
        <td>Book Title</td>
        <td><?= $book_title ?></td>
    </tr>
    <tr>
        <td>Author</td>
        <td><?= $author ?></td>
    </tr>
    <tr>
        <td>Amazon URL</td>
        <td><?= $amazon_url ?></td>
    </tr>
</table>

<?php
$data['yourName']="Ilker";
echo $this->context->renderPartial('_advert',$data);

?>
