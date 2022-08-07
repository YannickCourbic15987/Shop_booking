<?php

namespace Src\Core;

use App\Src\Model\UsersModel;

class Validator
{

    public function __construct(
        private array $data,
        private array $filtredData = [],

    ) {
    }

    public function validate()
    {

        // je commence par nettoyer mes données 

        if (!empty($_POST) && isset($_POST)) {


            foreach ($this->data as $name => $value) {

                if (!empty($name) && !empty($value)) {

                    $name = trim(htmlspecialchars($name));
                    $value = trim(htmlspecialchars($value));
                    $this->filtredData[$name] = $value;
                }
            }
        }
    }
    /**
     *         
     *au moins une minuscule char
     *au moins une lettre majuscule, char
     *au moins un chiffre
     *au moins un signe spécial de @#-_$%^&+=§!?
     */

    public function confirmPassword(): bool
    {
        if (!empty($this->filtredData) && $this->filtredData['password'] === $this->filtredData['password_confirm'] && preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $this->filtredData['password'])) {
            return true;
        }
        return false;
    }

    public function validEmail(): bool
    {
        if (!empty($this->filtredData) && filter_var($this->filtredData['email'], FILTER_VALIDATE_EMAIL) !== false) {
            return true;
        }
        return false;
    }

    public function uniqueEmail(): bool
    {
        // $user = new UsersModel();
        // $data = $user->findOneByEmail($this->filtredData['email']);
        // echo '<pre>';
        // var_dump($data);
        // echo '<pre/>';
        // if (!$data) {

        if (!empty($this->filtredData) && !(new UsersModel())->findOneByEmail($this->filtredData['email'])) {
            return true;
        }
        return false;
    }


    public function errors(): array
    {
        return [];
    }

    /**
     * Get the value of data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     */
    public function setData($data): self
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Get the value of data
     */
    public function getFiltredData()
    {
        return $this->filtredData;
    }

    /**
     * Set the value of data
     */
    public function setFiltredData($data): self
    {
        $this->filtredData = $data;
        return $this;
    }
}
