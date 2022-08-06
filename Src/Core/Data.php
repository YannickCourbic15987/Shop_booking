<?php

namespace App\Src\Core;

use PDO;

//*Pour les execptions , design patern singleton ! 
use PDOException;

class Data extends PDO
{

    //* une instance unique de la classe 
    private static $instance;

    //* on met en constante les infomartion de connexion
    //ici c'est toute mes constante 
    private const HOSTNAME = "localhost";
    private const DBNAME = "shop_booking";
    private const PORT = "3306";
    private const USERNAME = "root";
    private const PASSWORD = "";

    private function __construct()
    {
        $dsn = "mysql:host=" . self::HOSTNAME . ";dbname=" . self::DBNAME . ";port=" . self::PORT . ";charset=utf8";
        // on appelle le constructeur de la classe POO pusique que l'on a étendue 
        try {

            parent::__construct($dsn, self::USERNAME, self::PASSWORD);
            // qu'a chaque fois que je ferais un fetch / fecthall , sera associée à un tableau
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            //pour définir le mode de transfert d'erreur , errmode , cela permet de déclencher une execpt quand il ya une exception
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    // qui va permettre de générer une instance s'il y en a pas encore une et cela permet d'avoir une seul possibilité d'avoir une instance
    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
