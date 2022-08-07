<?php

namespace App\Src\Controllers;

class LogoutController extends Controller
{


    public function index()
    {

        $this->render('logout/index', []);
    }
}
