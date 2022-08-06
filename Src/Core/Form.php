<?php

namespace Src\Core;

class Form
{
    private $formCode = '';
    /**
     * Générateur de formulaire !!!
     * génére le formulaire HTML 
     *
     * @return string 
     */
    public function create()
    {

        return $this->formCode;
    }
    /**
     * Valide si tout les champs sont remplis 
     *
     * @param array $form Tableau issu du formulaire ($_POST , $_GET)
     * @param array $champs Tableau listant les champs obligatoire 
     * @return bool
     */
    // on pourra intérroger l'objet sans avoir besoin d'instancier 
    public static function validate(array $form, array $champs): bool
    {
        //on parcours les champs 
        foreach ($champs as $champ) {
            //si le champs est absent ou vide dans le formulaire 

            if (!isset($form[$champ]) || empty($form[$champ])) {
                //on sort en retournant false
                return false;
            }
        }
        return true;
    }

    /**
     * Ajoute les attributs envoyés à la balise 
     *
     * @param array $attributs Tableau associatif ['class' =>'form control' , 'required'=>true]
     * @return string chaîne de caractères générée
     * ! array('id' => 'password' , 'class' => 'form-control' , 'autofocus' => true)
     */
    private function addAttribut(array $attributs): string
    {
        //  On iniatilise une chaîne de caractères

        $str = '';
        //! On liste les attributs "courts" comme par exemple required 

        $courts = [
            'checked',
            'disabled',
            'readonly',
            'multiple',
            'required',
            'autofocus',
            'novalidate',
            'formnovalidate'
        ];
        //! on boucle sur le tableau d'attributs 
        foreach ($attributs as $attribut => $valeur) {
            //! si l'attribut est dans la liste des attributs courts
            //? in_array indique si une valeur appartient à un tableau et cela retourne un booléen 
            if (in_array($attribut, $courts) && $valeur == true) {
                $str .= " $attribut ";
            } else {
                // on ajoute attribut = 'valeur'
                //! ex: enctype = multipart/form-data
                $str .= " $attribut = '$valeur'";
            }
        }



        return $str;
    }


    //! Création de la balise form 
    /**
     * 
     *Balise d'ouverture du formulaire 
     * @param string $methode Méthode du formulaire 
     * @param string $action Action du formulaire 
     * @param array $attributs Atribut 
     * @return self
     */
    public function startform(string $methode = 'post', string $action = '#', array $attributs = []): self
    {

        //! on va crée la balise form 

        $this->formCode .= "<form action='$action'  methode='$methode' ";
        // on ajoute les attributs éventuel
        // si il existe alors on ajoute $attributs à formcode via la function addatribut

        $this->formCode .= $attributs ? $this->addAttribut($attributs) . '>' : '>';
        return $this;
    }
    /**
     * Balise de fermeture form 
     *
     * @return self
     */
    public function endform(): self
    {
        $this->formCode .= "</form>";
        return $this;
    }
    /**
     * Ajout du label
     *
     * @param string $for
     * @param string $txt
     * @param array $attributs
     * @return self
     */
    public function  addlabel(string $for, string $txt, array $attributs = []): self
    {    // on ouvre la balise 
        $this->formCode .= "<label for='$for'";
        $this->formCode .= $attributs ? $this->addAttribut($attributs) . '>' : '>';
        //on ajoute le code 
        $this->formCode .= " " . $txt . " ";
        $this->formCode .= "</label>";
        return $this;
    }

    public function addInput(string $name, string $type, array $attributs = []): self
    {

        $this->formCode .= "<input type = '$type' name = '$name' ";
        $this->formCode .= $attributs ? $this->addAttribut($attributs) . '>' : '>';
        return $this;
    }

    public function addTextArea(string $name, string $valeur = '', array $attributs = []): self
    {
        $this->formCode .= "<textarea name='$name'";
        $this->formCode .= $attributs ? $this->addAttribut($attributs) . '>' : '>';
        //on ajoute le code 
        $this->formCode .= " " . $valeur . " ";
        $this->formCode .= "</textarea>";
        return $this;
    }

    public function addSelect(string $name, array $options, array $attributs = []): self
    {
        $this->formCode .= "<select name = '$name";
        $this->formCode .= $attributs ? $this->addAttribut($attributs) . '>' : '>';
        foreach ($options as $valeur => $texte) {
            $this->formCode .= "<option value = '$valeur' > $texte </option>";
        }
        $this->formCode .= "</select>";
        return $this;
    }

    public function addBtn(string $texte, array $attributs = []): self
    {
        $this->formCode .= "<button ";
        $this->formCode .=  $attributs ? $this->addAttribut($attributs) . '>' : '>';
        $this->formCode .= " " . $texte . " " . "</button>";
        return $this;
    }
}
