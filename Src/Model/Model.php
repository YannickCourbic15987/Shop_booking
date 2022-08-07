<?php

namespace App\Src\Model;

use App\Src\Core\Data;

abstract class Model extends Data
{
    // Table de la base de données

    protected $table;
    //Privée pour l'Instance de $database;

    private $database;

    //méthode principale de notre requête préparée ; query = requête simple 

    public function queryBuild(string $sql, array $attributs = null)
    {
        // on récupère l'instance de db
        $this->database = Data::getInstance();

        // On vérifie si on a des attributs 

        if ($attributs !== null) {
            //!Requête préparée 
            $query = $this->database->prepare($sql);
            $query->execute($attributs);
            return $query;
        } else {
            //* Requête simple avec query ; cela va être des select pour du display
            return $this->database->query($sql);
        }
    }


    // liste total de ma table , je récup les données full mvc
    //*********************************READ de CRUD**************************  
    public function findAll()
    {
        $query = $this->queryBuild("SELECT * FROM " . $this->table);
        return $query->fetchAll();
    }
    //création pour 
    // création de finby
    public function findBy(array $criteria)
    {
        $champs = [];
        $valeurs = [];

        // on va boucler pour écalter le tableau 

        foreach ($criteria as $champ => $valeur) {
            // SELECT * FROM book WHERE title = ? AND id_book = 1
            //binValue(1, valuer)
            $champs[] = "$champ = ?";
            $valeurs[] =  $valeur;
        }
        //On transforme le tableau "champs" en une chaîne de caractères
        $liste_champs = join(' AND ', $champs);
        // var_dump($liste_champs);
        // var_dump($valeurs);
        //on exécute la requête 

        $query =  $this->queryBuild('SELECT * FROM ' . $this->table . ' WHERE ' . $liste_champs, $valeurs);

        return $query->fetchAll();
        // return var_dump($query);
    }

    //* fonctionnelle !
    public function find(string $champs, string $id)
    {
        $query = $this->queryBuild(" SELECT * FROM $this->table WHERE $champs = $id ");
        return $query->fetch();
    }

    public function findOneByEmail($email)
    {
        $query = $this->queryBuild("SELECT * FROM $this->table WHERE email = ? ", [$email]);
        return $query->fetch();
    }

    //****FIN READ *********/


    //**********************************DEBUT CREATE**********************/
    public function create()
    {
        $champs = [];
        $valeurs = [];
        $inter = [];

        // on va boucler pour écalter le tableau 

        foreach ($this as $champ => $valeur) {
            // INSERT INTO book (title , description, picture , release_date) VALUE (?,?,?,?)
            //binValue(1, valuer)
            if ($valeur !== null && $champ != 'database' && $champ != 'table') {

                $champs[] = $champ;
                $inter[] = "?";
                $valeurs[] =  $valeur;
            }
        }
        //On transforme le tableau "champs" en une chaîne de caractères
        $liste_champs = join(' , ', $champs);
        $liste_inter = join(', ', $inter);
        // echo "<pre>";
        // var_dump($model);
        // echo "<pre/>";
        // var_dump($valeurs);
        // echo "<br/>" . $liste_champs;
        // die($liste_inter);
        // var_dump($liste_champs);
        // var_dump($valeurs);
        //on exécute la requête 

        $query =  $this->queryBuild('INSERT INTO ' . $this->table . ' ('  . $liste_champs . ') VALUES (' . $liste_inter . ') ', $valeurs);
        // var_dump($query);
        return $query;
    }

    //**méthode hydrate */

    public function hydrate($donnees)
    {
        foreach ($donnees as $key => $value) {
            //** On récupère le nom du setter correspondant à la clé (key) */
            //**titre -> setTtitre*/
            $setter = 'set' . ucfirst($key);
            //**On vérifie si le setter existe  */
            if (method_exists($this, $setter)) {
                //**On appelle le setter  */
                $this->$setter($value);
            }
        }
        return $this;
    }
    //*************************** FIN de CREATE**********************/


    //****************************DEBUT DE UPDATE **********************/

    public function update(int $id, string $nameId)
    {
        $champs = [];
        $valeurs = [];


        // on va boucler pour écalter le tableau 

        foreach ($this as $champ => $valeur) {
            // UPDATE  book  SET title = ? , description = ?, picture = ? , release_date = ? WHERE id = ? 
            //binValue(1, valuer)
            if ($valeur !== null && $champ != 'database' && $champ != 'table') {

                $champs[] = "$champ = ?";
                $valeurs[] =  $valeur;
            }
        }
        $valeurs[] = $id;
        //On transforme le tableau "champs" en une chaîne de caractères
        $liste_champs = join(' , ', $champs);

        // echo "<pre>";
        // var_dump($model);
        // echo "<pre/>";
        // var_dump($valeurs);
        // echo "<br/>" . $liste_champs;
        // die($liste_inter);
        // var_dump($liste_champs);
        // var_dump($valeurs);
        //on exécute la requête 

        $query =  $this->queryBuild('UPDATE ' . $this->table . ' SET ' . $liste_champs . ' WHERE ' . $nameId . '=  ? ', $valeurs);
        // var_dump($query);
        return $query;
    }
    //** ***************FIN UPDATE ***********************/

    //*******************DEBUT DELETE ************************ */

    public function delete(int $id, string $nameId)
    {
        $valeurs = [];
        $valeurs[] = $id;
        $query = $this->queryBuild('DELETE FROM ' . $this->table . ' WHERE ' . $nameId . ' =  ?', $valeurs);
        return $query;
    }
}





//un modele , design patern modele , classe générale qui va nous permettre d'intéragir , qui va nous permettre d'accéder a la bdd = CRUD ;
