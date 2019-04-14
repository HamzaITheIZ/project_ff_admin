<?php

class Connexion
{
    private $connexion;
    function __construct()
    {
        $username = "root";
        $password = "";
        $dsname = "mysql:host=localhost;dbname=project_ff";

        try{
            $this->connexion = new PDO($dsname,$username,$password);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            die("erreur ! :" .$e->getMessage());
        }
    }
    function getConnexion()
    {
        return $this->connexion;
    }
}

?>