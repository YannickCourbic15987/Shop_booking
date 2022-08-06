<?php

namespace App\Src\Controllers;

use App\Src\Model\BookModel;
use App\Src\Model\UsersModel;

class BookController extends Controller
{

    public function index()
    {
        $book = new BookModel;
        $books = $book->findAll();

        $this->render('book/index', ['books' => $books]);
    }
    // affiche 1 livre
    public function lire(int $id)
    {
        //on instacie le modele
        $books = new BookModel;
        $book = $books->find('id_book', "$id");
        // on envoie à la view 

        $this->render('book/lire', ['book' => $book]);
    }
}
