<?php

/**
 * 
 */
class DBOperation {

    private $con;

    function __construct() {
        include_once("../database/db.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    public function getAllRecord($table) {
        if ($table == "livreur") {
            $sql = "SELECT * FROM " . $table . "";
        } else if ($table == "vehicule") {
            $sql = "SELECT * FROM " . $table . "";
        } else {
            $sql = "SELECT * FROM " . $table;
        }
        $pre_stmt = $this->con->prepare($sql);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }
        return "NO_DATA";
    }

    public function addVehicule($vehicule) {
        $pre_stmt = $this->con->prepare("INSERT INTO `vehicule`(`etat`, `numeroVehicule`)
		 VALUES (?,?)");
        $etat = "Disponible";
        $pre_stmt->bind_param("ss", $etat, $vehicule);
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            return "VEHICULE_ADDED";
        } else {
            return 0;
        }
    }

    public function addLivreur($nom, $cin, $adresse, $telephone) {
        $pre_stmt = $this->con->prepare("INSERT INTO `livreur`(`nom`, `cin` ,`adresse` ,`telephone`,`etat`)
		 VALUES (?,?,?,?,?)");
        $etat = "Disponible";
        $pre_stmt->bind_param("sssss", $nom, $cin, $adresse, $telephone, $etat);
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            return "LIVREUR_ADDED";
        } else {
            return 0;
        }
    }

    //Livraison treatement
    public function addLivraison($commande, $livreur, $vehicule) {
        $pre_stmt = $this->con->prepare("INSERT INTO `livraison`(`commande`, `livreur` ,`vehicule`,`dateLivraison`)
		 VALUES (?,?,?,?)");
        $date = date("d/m/Y H:i");
        $pre_stmt->bind_param("ssss", $commande, $livreur, $vehicule, $date);
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            return "LIVRAISON_ADDED";
        } else {
            return 0;
        }
    }

    //For Stat
    public function getAllStat($table) {
        if ($table == "top") {
            $sql = "SELECT P.nom,TRUNCATE(((count(L.nomPlat)*100) / (SELECT COUNT(*) from ligne_commande)),0) AS 'top'  from plat P INNER JOIN ligne_commande L on P.nom=L.nomPlat GROUP by P.nom ORDER by top DESC LIMIT 3";
        } else {
            $sql = "SELECT Count(*) as 'Stat' FROM " . $table;
        }
        $pre_stmt = $this->con->prepare($sql);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        $rows = array();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row;
        } else if ($result->num_rows > 1) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return $rows;
        }
    }

    public function checkCommandePlus() {

        $sql = "SELECT Count(*) as 'Count' FROM commande";

        $pre_stmt = $this->con->prepare($sql);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        }
        if ($row["Count"] > $_SESSION["CommandeCount"]) {
            $_SESSION["CommandeCount"] = $row["Count"];
            return 1;
        } else {
            return 0;
        }
    }

}

//$m = new DBOperation();
//print_r($m ->getAllStat("plat"));
?>