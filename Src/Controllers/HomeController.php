<?php

namespace App\Src\Controllers;

class HomeController extends Controller
{
    public function index()
    {


        $this->render('home/index', []);
    }
}
