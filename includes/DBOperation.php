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
        if($table == "livreur") {
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

}

?>
