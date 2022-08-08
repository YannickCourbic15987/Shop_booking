<?php

namespace App\Src\Controllers;

use App\Src\Model\BookModel;

class AdminBookController extends Controller
{
    public function index()
    {

        if ($this->isAdmin()) {
            $book = new BookModel;
            $books = $book->findAll();
            $this->render('admin/book', [
                'books' => $books
            ]);
        } else {
            header('Location: home');
        }
    }
    private function isAdmin()
    {
        // on vérifie si on est connecté et si "admin" est dans nos rôles
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') {
            return true;
        } else {
            $_SESSION['erreur'] = "Vous n'avez pas accès à cette zone";
            header('Location: home');
        }
    }
}
