<?php
include_once("../database/constants.php");
include_once("user.php");
include_once("manage.php");


$email = $_SESSION["email"];

//For Login 
if (isset($_POST["log_email"]) AND isset($_POST["log_password"])) {
    $user = new User();
    $result = $user->userLogin($_POST["log_email"], $_POST["log_password"]);
    echo $result;
    exit();
}

//For Employe Creation
if (isset($_POST["employe_nom"]) AND isset($_POST["employe_email"])) {
    $user = new User();
    $result = $user->addemployes($_POST["employe_nom"]." ".$_POST["employe_prenom"],$_POST["employe_cin"], $_POST["employe_email"], $_POST["employe_password"], $_POST["employe_adresse"], $_POST["employe_tele"]);
    echo $result;
    exit();
}

//fill employe table
if (isset($_POST["manageUser"])) {
    $fu = new User();
    $result = $fu->manageUsers($email);
    $rows = $result["rows"];
    if (count($rows) > 0) {
        foreach ($rows as $row) {
            ?>
            <tr>
                <td><?php echo $row["nom"]; ?></td>
                <td><?php echo $row["cin"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["adresse"]; ?></td>
                <td><?php echo $row["telephone"]; ?></td>
                <td class="text-center">
                    <a data-toggle="modal" data-target="#update_employe" eid="<?php echo $row['id']; ?>" class="btn btn-primary btn-sm edit_user">Modifier</a>
                    <a href="#" did="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm del_user">Supprimer</a>
                </td>
            </tr>
            <?php
        }
        exit();
    }
}
//Delete Employe
if (isset($_POST["deleteUser"])) {
    $m = new Manage();
    $result = $m->deleteRecord("employe", $_POST["id"]);
    echo $result;
}

//Update Employe
if (isset($_POST["updateUser"])) {
    $m = new Manage();
    $result = $m->getSingleRecord("employe", $_POST["id"]);
    echo json_encode($result);
    exit();
}

//Update Record after getting data
if (isset($_POST["modal_enom"])) {
    $m = new Manage();
    $id = $_POST["id"];
    $nom = $_POST["modal_enom"];
    $cin = $_POST["modal_ecin"];
    $adresse = $_POST["modal_eadresse"];
    $tele = $_POST["modal_etele"];
    
    $result = $m->update_record("employe", ["id" => $id], ["nom"=>$nom, "cin" => $cin, "adresse" => $adresse,"telephone"=>$tele]);
    echo $result;
}

?>