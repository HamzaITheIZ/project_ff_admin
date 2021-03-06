<?php
include_once("../database/constants.php");
include_once("user.php");
include_once("manage.php");
include_once("DBOperation.php");

if (isset($_SESSION["CommandeCount"])) {
    $commandeCount = $_SESSION["CommandeCount"];
} else {
    $commandeCount = "notyet";
}

//$email = $_SESSION["email"];
//For Login 
if (isset($_POST["log_email"]) AND isset($_POST["log_password"])) {
    $user = new User();
    $result = $user->userLogin($_POST["log_email"], $_POST["log_password"]);
    echo $result;
    exit();
}
//For Edit Profile
if (isset($_POST["passwordnew"]) AND isset($_POST["passwordf"])) {
    $user = new User();
    $result = $user->profilEdit($_POST["usernamen"], $_POST["passwordf"], $_POST["passwordnew"], $_POST["pemail"]);
    echo $result;
    exit();
}
//For Edit Name Only
if (isset($_POST["editName"])) {
    $user = new User();
    $name = $_POST["name"];
    $email = $_POST["email"];
    $result = $user->editProfilName($name, $email);
    echo $result;
}
//For Employe Creation
if (isset($_POST["employe_nom"]) AND isset($_POST["employe_email"])) {
    $user = new User();
    $result = $user->addemployes($_POST["employe_nom"] . " " . $_POST["employe_prenom"], $_POST["employe_cin"], $_POST["employe_email"], $_POST["employe_password"], $_POST["employe_adresse"], $_POST["employe_tele"], $_POST["role"]);
    echo $result;
    exit();
}

//fill employe table
if (isset($_POST["manageEmploye"])) {
    $fu = new User();
    $result = $fu->FillUsers();
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

//getting Employe
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
    $role = $_POST["urole"];

    $result = $m->update_record("employe", ["id" => $id], ["nom" => $nom, "cin" => $cin, "adresse" => $adresse, "telephone" => $tele, "role" => $role]);
    echo $result;
}

//fill commande table
if (isset($_POST["manageCommande"])) {
    $m = new Manage();
    $result = $m->fillAnyRecord("commande");
    $rows = $result["rows"];
    $check = 1;
    if (count($rows) > 0) {
        foreach ($rows as $row) {
            $id = null;
            $id = $row["fourid"];
            if ($id != null) {
                $check = $m->checkfourpresence("livreur", $id);
            }
            if ($check == 0) {
                $m->update_record("livreur", ["id" => $id], ["etat" => "Disponible"]);
            } else {
                $m->update_record("livreur", ["id" => $id], ["etat" => "Indisponible"]);
            }
            $id = $row["idvehi"];
            if ($id != null) {
                $check = $m->checkfourpresence("vehicule", $id);
            }
            if ($check == 0) {
                $m->update_record("vehicule", ["id" => $id], ["etat" => "Disponible"]);
            } else {
                $m->update_record("vehicule", ["id" => $id], ["etat" => "Indisponible"]);
            }
            ?>
            <tr class="text-center">
                <td><?php echo $row["nom"]; ?></td>
                <td><?php echo $row["cin"]; ?></td>
                <td><?php echo $row["Responsable"]; ?></td>
                <td><?php echo $row["dateCommande"]; ?></td>
                <td><?php echo $row["Livreur"]; ?></td>
                <td><?php echo $row["numeroVehicule"]; ?></td>
                <?php
                if ($row["etatLivraison"] === "Pas Encore") {
                    ?>
                    <td>
                        <div >
                            <span class="alert alert-warning" role="alert"><?php echo $row["etatLivraison"]; ?></span>
                        </div>
                    </td>
                    <?php
                } else if ($row["etatLivraison"] === "Sous Livraison") {
                    ?>
                    <td>
                        <div >
                            <span class="alert alert-info" role="alert"><?php echo $row["etatLivraison"]; ?></span>
                        </div>
                    </td>
                    <?php
                } else {
                    ?>
                    <td>
                        <div >
                            <span class="alert alert-success" role="alert"><?php echo $row["etatLivraison"]; ?></span>
                        </div>
                    </td>
                    <?php
                }
                ?>
                <td class="text-center">
                    <a data-toggle="modal" data-target="#update_commande" eid="<?php echo $row['id']; ?>" class="btn btn-primary btn-sm edit_commande">Modifier</a>
                    <a href="#" did="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm del_commande">Supprimer</a>
                </td>
            </tr>
            <?php
        }
        exit();
    }
}
//Delete Commande
if (isset($_POST["deleteCommande"])) {
    $m = new Manage();
    $result = $m->deleteRecord("commande", $_POST["id"]);
    echo $result;
}

//Getting Commande
if (isset($_POST["updateCommande"])) {
    $m = new Manage();
    $result = $m->getSingleRecord("commande", $_POST["id"]);
    echo json_encode($result);
    exit();
}

//Update Commande
if (isset($_POST["select_etat"])) {
    $m = new Manage();
    $dbo = new DBOperation();
    $id = $_POST["id"];
    $nomliv = $_POST["select_liv"];
    $nv = $_POST["select_veh"];
    $etat = $_POST["select_etat"];
    $employe = $_POST["employe"];

    $result = $m->update_record("commande", ["id" => $id], ["livreurCommande" => $nomliv, "vehiculeUtiliser" => $nv, "etatLivraison" => $etat, "responsable" => $employe]);

    if ($result == "UPDATED") {
        $dbo->addLivraison($id, $nomliv, $nv);
    }

    echo $result;
}
//Update Etat Only
if (isset($_POST["UpdateEtat"])) {
    $m = new Manage();
    $id = $_POST["cid"];
    $etat = $_POST["etat"];
    $result = $m->update_record("commande", ["id" => $id], ["etatLivraison" => $etat]);
    echo $result;
}
//Update Livraison Infos
if (isset($_POST["UpdateLivraison"])) {
    $m = new Manage();
    $id = $_POST["cid"];
    $livreur = $_POST["livreur"];
    $vehicule = $_POST["vehicule"];
    $result = $m->update_record("livraison", ["commande" => $id], ["livreur" => $livreur, "vehicule" => $vehicule]);

    if ($result == "UPDATED") {
        $result = $m->update_record("commande", ["id" => $id], ["livreurCommande" => $livreur, "vehiculeUtiliser" => $vehicule]);
    }
    echo $result;
}

//Fetch Livreur
if (isset($_POST["getLivreur"])) {
    $obj = new DBOperation();
    $rows = $obj->getAllRecord("livreur");
    foreach ($rows as $row) {
        echo "<option value='" . $row["id"] . "'>" . $row["nom"] . "</option>";
    }
    exit();
}

//Fetch Vehicule
if (isset($_POST["getVehicule"])) {
    $obj = new DBOperation();
    $rows = $obj->getAllRecord("vehicule");
    foreach ($rows as $row) {
        echo "<option value='" . $row["id"] . "'>" . $row["numeroVehicule"] . "</option>";
    }
    exit();
}

//Add Vehicule
if (isset($_POST["modal_vehicule"])) {
    $obj = new DBOperation();
    $result = $obj->addVehicule($_POST["modal_vehicule"]);
    echo $result;
    exit();
}
//Fill Vehicule Table
if (isset($_POST["manageVehicule"])) {
    $m = new Manage();
    $result = $m->fillAnyRecord("vehicule");
    $rows = $result["rows"];
    if (count($rows) > 0) {
        foreach ($rows as $row) {
            ?>
            <tr class="text-center">
                <td><?php echo $row["numeroVehicule"]; ?></td>
                <?php
                if ($row["etat"] === "Disponible") {
                    ?>
                    <td>
                        <div >
                            <span class="alert alert-success" role="alert"><?php echo $row["etat"]; ?></span>
                        </div>
                    </td>
                    <?php
                } else {
                    ?>
                    <td>
                        <div >
                            <span class="alert alert-danger" role="alert"><?php echo $row["etat"]; ?></span>
                        </div>
                    </td>
                    <?php
                }
                ?>
                <td class="text-center">
                    <a data-toggle="modal" data-target="#update_vehicule" eid="<?php echo $row['id']; ?>" class="btn btn-primary btn-sm edit_vehicule">Modifier</a>
                    <a href="#" did="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm del_vehicule">Supprimer</a>
                </td>
            </tr>
            <?php
        }
        exit();
    }
}
//Delete Vehicule
if (isset($_POST["deleteVehicule"])) {
    $m = new Manage();
    $result = $m->deleteRecord("vehicule", $_POST["id"]);
    echo $result;
}

//Getting Vehicule
if (isset($_POST["updateVehicule"])) {
    $m = new Manage();
    $result = $m->getSingleRecord("vehicule", $_POST["id"]);
    echo json_encode($result);
    exit();
}

//Update Vehicule
if (isset($_POST["select_vetat"])) {
    $m = new Manage();
    $id = $_POST["id"];
    $numV = $_POST["num_vehicule"];
    $etat = $_POST["select_vetat"];

    $result = $m->update_record("vehicule", ["id" => $id], ["etat" => $etat, "numeroVehicule" => $numV]);
    echo $result;
}

//fill Client table
if (isset($_POST["manageClient"])) {
    $m = new Manage();
    $result = $m->fillAnyRecord("client");
    $rows = $result["rows"];
    if (count($rows) > 0) {
        foreach ($rows as $row) {
            ?>
            <tr class="text-center">
                <td><?php echo $row["nom"]; ?></td>
                <td><?php echo $row["cin"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["adresse"]; ?></td>
                <td><?php echo $row["telephone"]; ?></td>
                <td><?php echo $row["password"]; ?></td>
                <td class="text-center">
                    <!--<a data-toggle="modal" data-target="#update_client" eid="<?php echo $row['id']; ?>" class="btn btn-primary btn-sm edit_client">Modifier</a>-->
                    <a href="#" did="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm del_client">Supprimer</a>
                </td>
            </tr>
            <?php
        }
        exit();
    }
}
//Delete Client
if (isset($_POST["deleteClient"])) {
    $m = new Manage();
    $result = $m->deleteRecord("client", $_POST["id"]);
    echo $result;
}


//Add Livreur
if (isset($_POST["nom_livreur"])) {
    $obj = new DBOperation();
    $result = $obj->addLivreur($_POST["nom_livreur"] . " " . $_POST["prenom_livreur"], $_POST["cin_livreur"], $_POST["adresse_livreur"], $_POST["tele_livreur"]);
    echo $result;
    exit();
}
//Fill Livreur Table
if (isset($_POST["manageLivreur"])) {
    $m = new Manage();
    $result = $m->fillAnyRecord("livreur");
    $rows = $result["rows"];
    if (count($rows) > 0) {
        foreach ($rows as $row) {
            ?>
            <tr class="text-center">
                <td><?php echo $row["nom"]; ?></td>
                <td><?php echo $row["cin"]; ?></td>
                <td><?php echo $row["adresse"]; ?></td>
                <td><?php echo $row["telephone"]; ?></td>
                <?php
                if ($row["etat"] === "Disponible") {
                    ?>
                    <td>
                        <div >
                            <span class="alert alert-success" role="alert"><?php echo $row["etat"]; ?></span>
                        </div>
                    </td>
                    <?php
                } else {
                    ?>
                    <td>
                        <div >
                            <span class="alert alert-danger" role="alert"><?php echo $row["etat"]; ?></span>
                        </div>
                    </td>
                    <?php
                }
                ?>
                <td class="text-center">
                    <a data-toggle="modal" data-target="#update_livreur" eid="<?php echo $row['id']; ?>" class="btn btn-primary btn-sm edit_livreur">Modifier</a>
                    <a href="#" did="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm del_livreur">Supprimer</a>
                </td>
            </tr>
            <?php
        }
        exit();
    }
}
//Delete Livreur
if (isset($_POST["deleteLivreur"])) {
    $m = new Manage();
    $result = $m->deleteRecord("livreur", $_POST["id"]);
    echo $result;
}

//Getting Livreur
if (isset($_POST["updateLivreur"])) {
    $m = new Manage();
    $result = $m->getSingleRecord("livreur", $_POST["id"]);
    echo json_encode($result);
    exit();
}

//Update Vehicule
if (isset($_POST["etat_livreur"])) {
    $m = new Manage();
    $id = $_POST["id"];
    $nom = $_POST["unom_livreur"];
    $cin = $_POST["ucin_livreur"];
    $adresse = $_POST["uadresse_livreur"];
    $tele = $_POST["utele_livreur"];
    $etat = $_POST["etat_livreur"];


    $result = $m->update_record("livreur", ["id" => $id], ["nom" => $nom, "cin" => $cin, "adresse" => $adresse, "telephone" => $tele, "etat" => $etat]);
    echo $result;
}

//Fill Livraison
if (isset($_POST["fillLivraison"])) {
    $m = new Manage();
    $result = $m->fillAnyRecord("livraison");
    $rows = $result["rows"];
    if (count($rows) > 0) {
        $n = 1;
        foreach ($rows as $row) {
            ?>
            <tr class="text-center">
                <td><?php echo $n;?></td>
                <td>N°<?php echo $row["id"]; ?></td>
                <td><?php echo $row["nom"]; ?></td>
                <td><?php echo $row["numeroVehicule"]; ?></td>
                <td><?php echo $row["dateLivraison"]; ?></td>
                <?php
                if ($row["etatLivraison"] === "Pas Encore") {
                    ?>
                    <td>
                        <div >
                            <span class="alert alert-warning" role="alert"><?php echo $row["etatLivraison"]; ?></span>
                        </div>
                    </td>
                    <?php
                } else if ($row["etatLivraison"] === "Sous Livraison") {
                    ?>
                    <td>
                        <div >
                            <span class="alert alert-info" role="alert"><?php echo $row["etatLivraison"]; ?></span>
                        </div>
                    </td>
                    <?php
                } else {
                    ?>
                    <td>
                        <div >
                            <span class="alert alert-success" role="alert"><?php echo $row["etatLivraison"]; ?></span>
                        </div>
                    </td>
                    <?php
                }
                ?>
            </tr>
            <?php
            $n++;
        }
        exit();
    }
}
//----------------Stat------------------
//Plat Stat
if (isset($_POST["statPlat"])) {
    $obj = new DBOperation();
    $row = $obj->getAllStat("plat");

    echo $row["Stat"];

    exit();
}
//Commande Stat
if (isset($_POST["statCommande"])) {
    $obj = new DBOperation();
    $row = $obj->getAllStat("commande");

    echo $row["Stat"];

    exit();
}
//Client Stat
if (isset($_POST["statClient"])) {
    $obj = new DBOperation();
    $row = $obj->getAllStat("client");

    echo $row["Stat"];

    exit();
}
//sold Stat
if (isset($_POST["statSales"])) {
    $obj = new DBOperation();
    $row = $obj->getAllStat("ligne_commande");

    echo $row["Stat"];

    exit();
}
//Top Plats
if (isset($_POST["topPlats"])) {
    $obj = new DBOperation();
    $rows = $obj->getAllStat("top");

    if (count($rows) > 2) {
        foreach ($rows as $row) {
            ?>
            <div class="skill">
                <div class="graph" style="height: <?php echo $row["top"];?>%">
                    <div class="percent"><?php echo $row["top"];?>%</div>
                </div>
                <div class="name"><?php echo $row["nom"];?></div>
            </div>
            <?php
        }
    }
    
    exit();
}
//Commande Count
/* if (isset($_POST["commandeCount"])) {

  echo $commandeCount;

  exit();
  } */
//Check Coummande
if (isset($_POST["checkCommande"])) {
    $obj = new DBOperation();
    $result = $obj->checkCommandePlus();

    echo $result;

    exit();
}
?>