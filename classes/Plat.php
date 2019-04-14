<?php

class Plat {
    private $id;
    private $nom;
    private $description;
    private $prix;
    private $photo;
    
    function __construct($id,$nom, $description, $prix, $photo) {
        $this->id=$id;
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->photo = $photo;
    }
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    
    function getNom() {
        return $this->nom;
    }

    function getDescription() {
        return $this->description;
    }

    function getPrix() {
        return $this->prix;
    }

    function getPhoto() {
        return $this->photo;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setPrix($prix) {
        $this->prix = $prix;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }



    
    
}
