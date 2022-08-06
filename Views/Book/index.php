<h1>Mes livres</h1>
<?php foreach ($books as $book) : ?>
    <h3><a href="book/lire/<?= $book->id_book ?>"><?= $book->title ?></a></h3>
    <p><?= $book->description ?></p>

<?php endforeach; ?>