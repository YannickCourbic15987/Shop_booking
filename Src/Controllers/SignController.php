<?php

namespace App\Src\Controllers;

use App\Src\Model\UsersModel;

class SignController extends Controller
{
    public function index()
    {
        $user = new UsersModel;
        $users = $user->findAll();
        // $this->render('annonce/index', compact('annonce'));
        $this->render('sign/index', ['users' => $users]);
    }
}
