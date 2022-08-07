<?php

namespace App\Src\Controllers;

abstract class Controller
{

    public function render(string $fichier, array $donnees = [], $templates = 'base')
    {
        // on extrait le contenu des contenues 



        extract($donnees);
        //On démarre le buffer de sortie 
        ob_start();
        //a partir de ce point toute sortie est conservée en méoire
        //cela stock dans la variable;



        //en faisant extract de donnkées , il m'a crée une variable , et m'a le tableau de tout mes users d'origine
        // ce prend mon tableau et cela attribut selon les key que nous avons , il va lui en attribuer une variable $a et $b car key a et key b et lui applique la veleur d'origine 
        //on crée le chemin vers la view 
        require_once ROOT . '/Views/' . $fichier . '.php';
        //transfére le buffer dans $contains 
        $contains = ob_get_clean();
        //Template de page
        require_once ROOT . '/Views/' . $templates  . '.php';
    }
}
