<?php

namespace App\Src\Controllers;

class UsersController extends Controller
{
    public function index()
    {
        $this->render('users/index');
    }
}
