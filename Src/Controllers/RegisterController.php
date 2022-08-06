<?php

namespace App\Src\Controllers;

use App\Src\Core\Form;

class RegisterController extends Controller
{
    public function index()
    {
        $form = new Form;
        $form->startform()
            ->addlabel('firstname', 'Votre nom', ['class' => 'form-label'])
            ->addInput('firstname', 'text', ['class' => 'form-control', 'required' => true])
            ->addlabel('lastname', 'Votre prénom', ['class' => 'form-label'])
            ->addInput('lastname', 'text', ['class' => 'form-control', 'required' => true])
            ->addlabel('email', 'Votre email', ['class' => 'form-label'])
            ->addInput('email', 'email', ['class' => 'form-control', 'required' => true])
            ->addlabel('password', 'Votre mot de passe ', ['class' => 'form-label'])
            ->addInput('password', 'password', ['class' => 'form-control', 'required' => true])
            ->addlabel('password_confirm', 'Votre mot de passe à réecrire ', ['class' => 'form-label'])
            ->addInput('password_confirm', 'password', ['class' => 'form-control', 'required' => true])
            ->addBtn('S\'inscrire', ['class' => 'btn btn-primary mt-2'])
            ->endform();
        $this->render('/register/index', ['form' => $form->create()]);
    }
}
