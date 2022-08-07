<?php

namespace App\Src\Core;

use App\Src\Controllers\HomeController;

class Main
{
    public function start()
    {    //on démarre la session 
        session_start();





        //http//mes-annonces.test/controleur/methode/paramètre 
        //http://mes-annonce.test/annonces/details/brouettes
        //http://mes-annonces.test/index.php?p=annonces/details/brouette

        //*on retire le "trailing slash" éventuel de l'url

        $uri = $_SERVER['REQUEST_URI'];

        if (!empty($uri) && $uri != "/" && $uri[-1] === "/") {
            $uri = substr($uri, 0, -1);
            http_response_code(301);
            //on redirige l'url sans le slash
            header('Location:' . $uri);
        }
        //on va gérer les paramètes d'url
        //p=controlleur/methode/paramètres
        //on sépare les différents paramètres dans un tableau
        $params = [];
        if (isset($_GET['p']))
            $params = explode('/', $_GET['p']);
        // var_dump($params);
        if ($params[0] != '') {
            // on a au moins 1 paramétre 
            // var_dump($params);
            //on récup le nom du contrôleur à instancier
            //on met une masjuscule en première lettre , on ajoute le namsepace complet avant et on ajoute 
            $controller = '\\App\\Src\\Controllers\\' . ucfirst(array_shift($params)) . 'Controller';
            // on instancie le controller
            $controller = new $controller;
            //on récup le duxième params 
            $action = (isset($params[0])) ? array_shift($params) : 'index';

            if (method_exists($controller, $action)) {
                //si il reste des paramètres on les passe à la méthode 
                (isset($params[0])) ? call_user_func_array([$controller, $action], $params) : $controller->$action();
            } else {
                http_response_code(404);
                echo "la page recherché n'existe pas ";
            }
        } else {
            http_response_code(201);
            $controller = new HomeController();
            //appelle la methode index 
            $controller->index();
        }
    }
}
