<?php

namespace App\Src\Controllers;

use App\Src\Model\UsersModel;

class AdminController extends Controller
{
    public function index()
    {

        if ($this->isAdmin()) {
            $user = new UsersModel;
            $users = $user->findAll();
            $this->render('admin/index', [
                'users' => $users
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
