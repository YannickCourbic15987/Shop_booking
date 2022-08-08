<?php

namespace App\Src\Controllers;



class AdminAddBookController extends Controller
{
    public function index()
    {

        if ($this->isAdmin()) {
            $this->render('admin/addBook');
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
