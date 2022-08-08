<?php

namespace App\Src\Controllers;

use App\Src\Core\Form;
use App\Src\Model\UsersModel;
use Src\Core\Validator;

class RegisterController extends Controller
{

    public function index()
    {


        $form = new Form;
        $form
            ->addlabel('firstname', 'Votre nom', ['class' => 'form-label'])
            ->addInput('firstname', 'text', ['class' => 'form-control', 'id' => 'firstname', 'required' => true])
            ->addlabel('lastname', 'Votre prénom', ['class' => 'form-label'])
            ->addInput('lastname', 'text', ['class' => 'form-control', 'id' => 'lastname', 'required' => true])
            ->addlabel('email', 'Votre email', ['class' => 'form-label'])
            ->addInput('email', 'email', ['class' => 'form-control', 'id' => 'email', 'required' => true])
            ->addlabel('password', 'Votre mot de passe ', ['class' => 'form-label'])
            ->addInput('password', 'password', ['class' => 'form-control', 'id' => 'password', 'required' => true])
            ->addlabel('password_confirm', 'Votre mot de passe à réecrire ', ['class' => 'form-label'])
            ->addInput('password_confirm', 'password', ['class' => 'form-control', 'id' => 'password_confirm', 'required' => true])
            ->addInput('', 'submit', ['value' => "valider", 'class' => 'btn btn-primary mt-2']);

        $validator = new Validator($_POST);
        $validator->validate();
        if ($validator->uniqueEmail() && $validator->confirmPassword() && $validator->validEmail()) {
            $user = new UsersModel;
            $users = $user
                ->setFirstname($validator->getFiltredData()['firstname'])
                ->setLastname($validator->getFiltredData()['lastname'])
                ->setEmail($validator->getFiltredData()['email'])
                ->setPassword(password_hash($validator->getFiltredData()['password'], PASSWORD_ARGON2I))
                ->setRole('user');

            $users->create();

            $_SESSION['register'] = 1;
        }

        if (isset($_SESSION['user'])) {
            header('Location: home');
        }
        $this->render(
            'register/index',
            [
                'form' => $form->create()
            ]
        );
    }
}
