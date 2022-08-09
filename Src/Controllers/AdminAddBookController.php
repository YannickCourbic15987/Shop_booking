<?php

namespace App\Src\Controllers;

use App\Src\Model\BookModel;
use Src\Core\Validator;

class AdminAddBookController extends Controller
{
    public function index()
    {


        if ($this->isAdmin()) {
            if (isset($_FILES['picture']) && $_FILES['picture']['error'] === 0 && !empty($_POST)) {
                $image = $_FILES['picture'];
                if ($image['size'] <= 3000000) {
                    $info = pathinfo($image['name']);
                    $extension = ['jpg', 'jpeg', 'gif', 'png'];
                    $verifExtend = in_array($info['extension'], $extension);
                    if ($verifExtend) {
                        $src = str_replace('\\', '/', ROOT);
                        $source = $src . '/tmp/' . time() . rand() . rand() . '.' . $info['extension'];
                        $srcimg = substr(strrchr($source, '/'), 1);

                        move_uploaded_file($image['tmp_name'], $source);

                        $validator = new Validator($_POST);
                        $validator->validate();
                        $book = new BookModel;
                        $books = $book
                            ->setTitle($validator->getFiltredData()['title'])
                            ->setDescription($validator->getFiltredData()['description'])
                            ->setPicture($srcimg)
                            ->setPrice($validator->getFiltredData()['price'])
                            ->setReleaseDate($validator->getFiltredData()['date']);
                        $books->create();
                        header('Location: adminBook');
                    }
                }
            }
            $this->render('admin/addBook');
        } else {
            header('Location: home');
        }
    }
    private function isAdmin()
    {
        // on vérifie si on est connecté et si "admin" est dans nos rôles
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') {
            return true;
        } else {
            $_SESSION['erreur'] = "Vous n'avez pas accès à cette zone";
            header('Location: home');
        }
    }
}
