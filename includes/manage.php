<?php

class Manage {

    private $con;

    function __construct() {
        include_once("../database/db.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    // method updated by your needs
    public function fillAnyRecord($table) {
        if ($table == "commande") {
            $sql = "SELECT C.id,Cl.nom,Cl.cin,E.nom AS 'Responsable',C.dateCommande,L.id AS 'fourid',L.nom AS 'Livreur',V.id AS 'idvehi',V.numeroVehicule,C.etatLivraison from commande C INNER JOIN client Cl ON C.clientCommande=Cl.id LEFT JOIN vehicule V ON C.vehiculeUtiliser = V.id LEFT JOIN livreur L on C.livreurCommande = L.id LEFT JOIN employe E on C.responsable = E.id";
        }else if($table == "livraison"){
            $sql = "SELECT C.id,L.nom,V.numeroVehicule,Lv.dateLivraison,C.etatLivraison FROM livraison Lv INNER JOIN commande C on Lv.commande = C.id INNER JOIN livreur L on Lv.livreur = L.id INNER JOIN vehicule V on Lv.vehicule = V.id ";
        } else {
            $sql = "SELECT * FROM " . $table . " ";
        }
        $result = $this->con->query($sql) or die($this->con->error);
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return ["rows" => $rows];
    }

    public function getSingleRecord($table, $id) {
        $pre_stmt = $this->con->prepare("SELECT * FROM " . $table . " WHERE id = ? LIMIT 1");
        $pre_stmt->bind_param("i", $id);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        }
        return $row;
    }

    //delete li jab lah 
    public function deleteRecord($table, $id) {

        $pre_stmt = $this->con->prepare("DELETE FROM " . $table . " WHERE id = ?");
        $pre_stmt->bind_param("i", $id);
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            return "DELETED";
        }
    }

    //best method you can ever seen xD 
    public function update_record($table, $where, $fields) {
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
            // id = '5' AND m_name = 'something'
            $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        foreach ($fields as $key => $value) {
            //UPDATE table SET m_name = '' , qty = '' WHERE id = '';
            $sql .= $key . "='" . $value . "', ";
        }
        $sql = substr($sql, 0, -2);
        $sql = "UPDATE " . $table . " SET " . $sql . " WHERE " . $condition;
        if (mysqli_query($this->con, $sql)) {
            return "UPDATED";
        }
    }
    
    public function checkfourpresence($table,$id) {
        if($table == "livreur"){
            $sql = "SELECT * FROM `livreur` L INNER JOIN commande C on L.id = C.livreurCommande WHERE L.id = ? AND C.etatLivraison = 'Sous Livraison'";
        }else{
            $sql = "SELECT * FROM `vehicule` V INNER JOIN commande C on V.id = C.vehiculeUtiliser WHERE V.id = ? AND C.etatLivraison = 'Sous Livraison'";
        }
        $pre_stmt = $this->con->prepare($sql);
        $pre_stmt->bind_param("i",$id);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        if ($result->num_rows > 0) {
            return 1;
        }else{
            return 0;
        }
        
    }

}
//$m = new Manage();
//echo $m->checkfourpresence(1);
?>