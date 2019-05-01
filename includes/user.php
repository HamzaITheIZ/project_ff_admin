<?php

class User {

    private $con;

    function __construct() {
        include_once("../database/db.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    private function emailExists($email) {
        $pre_stmt = $this->con->prepare("SELECT id FROM employe WHERE email = ? ");
        $pre_stmt->bind_param("s", $email);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        if ($result->num_rows > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function addemployes($username, $cin, $email, $password, $adresse, $tele) {
        if ($this->emailExists($email)) {
            return "EMAIL_ALREADY_EXISTS";
        } else {
            $pass_hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 8]);
            $pre_stmt = $this->con->prepare("INSERT INTO `employe`(`cin`, `nom` , `email`, `adresse`, `telephone`, `password`)
			 VALUES (?,?,?,?,?,?)");
            $pre_stmt->bind_param("ssssss", $cin, $username, $email, $adresse, $tele, $pass_hash);
            $result = $pre_stmt->execute() or die($this->con->error);
            if ($result) {
                return $this->con->insert_id;
            } else {
                return "SOME_ERROR";
            }
        }
    }

    public function userLogin($email, $password) {
        $pre_stmt = $this->con->prepare("SELECT id,email,nom,password FROM employe WHERE email = ?");
        $pre_stmt->bind_param("s", $email);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();

        if ($result->num_rows < 1) {
            return "NOT_REGISTERD";
        } else {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row["password"])) {
                $_SESSION["userid"] = $row["id"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["username"] = $row["nom"];

                //Fill Count Commande Found
                $sql = "SELECT Count(*) as 'Count' FROM commande";

                $pre_stmt = $this->con->prepare($sql);
                $pre_stmt->execute() or die($this->con->error);
                $result = $pre_stmt->get_result();
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $_SESSION["CommandeCount"] = $row["Count"];
                }
                
                return 1;
            } else {
                return "PASSWORD_NOT_MATCHED";
            }
        }
    }

    public function FillUsers() {

        $sql = "SELECT id,cin,nom,email,adresse,telephone from employe";
        $result = $this->con->query($sql) or die($this->con->error);
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return ["rows" => $rows];
    }

}

//$obj = new User();
//echo $obj->addemployes("Aqannai Hamza", "EE112233", "Hamza.1@gmail.com", "Hamza5555", "Thanaout", "0622558899");
//echo $obj->userLogin("Hamza.1@gmail.com", "Hamza5555");
//$obj->FillUsers("Hamza@gmail.com");
?>