<?php

namespace App\Src\Controllers;

use App\Src\Core\Form;
use App\Src\Model\UsersModel;
use Src\Core\Validator;

class SignController extends Controller
{
    public function index()
    {     //on vérifie si le formulaire est complet 


        $form = new Form;
        $form
            ->addlabel('email', 'Votre email', ['class' => 'form-label'])
            ->addInput('email', 'email', ['class' => 'form-control', 'id' => 'email', 'required' => true])
            ->addlabel('password', 'Votre mot de passe ', ['class' => 'form-label'])
            ->addInput('password', 'password', ['class' => 'form-control', 'id' => 'password', 'required' => true])
            ->addInput('', 'submit', ['value' => "valider", 'class' => 'btn btn-primary mt-2']);


        $Root = explode('/', $_SERVER['REQUEST_URI']);
        $Root = array_slice($Root, 0, 3);
        $Root = join('/', $Root);
        $validator = new Validator($_POST);
        $validator->validate();
        if ($validator->validEmail()) {
            // le formulaire est complet 
            //on va chercher dans la base de données l'utilisation avec l'email entré 
            $user = new UsersModel;
            $userarray = $user->findOneByEmail(strip_tags($_POST['email']));
            //si l'utilisateur n'existe pas 

            if (!$userarray) {
                //on envoie un message de session 
                $_SESSION['erreur'] = "l'adresse e-mail et/ou le mot de passe est incorrect";
            }

            // l'utilisateur existe 
            $users = $user->hydrate($userarray);
            //on vérifie si le mdp est correct 
            if (password_verify($_POST['password'], $users->getPassword())) {
                //le mot de passe est bon 
                $user->setSession();
                // header('location : /home');
            } else {
                //mauvais mot de passe 
                $_SESSION['erreur'] = "l'adresse e-mail et/ou le mot de passe est incorrect";
            };
        } else {
            if (isset($_POST['logout'])) {
                session_unset();
            }
        }

        // $this->render('annonce/index', compact('annonce'));
        $this->render('sign/index', ['form' => $form->create()]);
    }
}
