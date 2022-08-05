<?php

namespace App\Src\Model;

use DateTime;
use App\Src\Model\Model;

class BookModel extends Model
{
    // cette classe annonce modèle 

    // protected $id,
    protected $title;
    protected $description;
    protected $picture;
    protected $release_date;
    public function __construct()
    {



        $this->table = 'book';
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of picture
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     */
    public function setPicture($picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of release_date
     */
    public function getReleaseDate(): string
    {
        return $this->release_date;
    }

    /**
     * Set the value of release_date
     */
    public function setReleaseDate(string $release_date): self
    {
        $this->release_date = $release_date;
        // va nous servir de créer les différentes en une seule fois 
        return $this;
    }
}
