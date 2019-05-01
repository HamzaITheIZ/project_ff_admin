<?php
include_once("./database/constants.php");

if (!isset($_SESSION["userid"])) {
    header("location:" . DOMAIN . "/index.php");
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <!--<link rel="icon" type="image/png" href="assets/img/favicon.ico">-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>EMPLOYES</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

        <!-- Bootstrap core CSS     -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="assets/css/demo.css" rel="stylesheet" />


        <!--     Fonts and icons     -->
        <!--
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        
        -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
        <script type="text/javascript" src="./js/main.js"></script>
        <script type="text/javascript" src="./js/manage.js"></script>
        <link rel="stylesheet" type="text/css" href="./css/titles.css">


    </head>
    <body>

        <div class="wrapper">
            <div class="sidebar" data-color="black" data-image="assets/img/side1.jpg">

                <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="index.php" class="simple-text">
                            <span style="color:#fac564;"><i class="fas fa-pizza-slice"></i>
                                HY's</span> 
                            Neteat
                        </a>
                    </div>

                    <ul class="nav">
                        <li>
                            <a href="dashboard.php">
                                <i class="far fa-chart-bar"></i>
                                <p>Statistique</p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="employe.php">
                                <!--<i class="pe-7s-user"></i>        -->                        
                                <i class="fas fa-user-tie"></i>
                                <p>LES EMPLOYES</p>
                            </a>
                        </li>
                        <li>
                            <a href="client.php">
                                <i class="fas fa-users"></i>
                                <p>Les Clients</p>
                            </a>
                        </li>
                        <li>
                            <a href="plat.php">
                                <i class="fas fa-hamburger"></i>
                                <p>Les plats</p>
                            </a>
                        </li>
                        <li>
                            <a href="livreur.php">
                                <i class="fas fa-running"></i>
                                <p>Les Livreurs</p>
                            </a>
                        </li>
                        <li>
                            <a href="vehicule.php">
                                <i class="fas fa-shuttle-van"></i>
                                <p>Les Vehicules</p>
                            </a>
                        </li>

                        <li>
                            <a href="commande.php">
                                <i class="far fa-newspaper"></i>
                                <p>commandes</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="main-panel" >
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">

                        <div class="collapse navbar-collapse">


                            <ul class="nav navbar-nav navbar-right">

                                <li>
                                    <a href="#">
                                        Log out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="content" >
                    <div class="container" >
                        <div class="row text-center">
                            <h1 class="titles">Espace de Employes</h1><br>
                        </div>
                        <div class="row">
                            <div class="col-md-11">
                                <div class="card">
                                    <div class="content">
                                        <form id="employe_form" onsubmit="return false" autocomplete="off">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Prenom d'employé : </label>
                                                        <input type="text" class="form-control border-danger" id="employe_prenom" name="employe_prenom">
                                                        <small id="p_error" class="form-text text-muted"></small>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nom d'employé : </label>
                                                        <input type="text" class="form-control" id="employe_nom" name="employe_nom">
                                                        <small id="n_error" class="form-text text-muted"></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>CIN : </label>
                                                        <input type="text" class="form-control" id="employe_cin" name="employe_cin"/>
                                                        <small id="cin_error" class="form-text text-muted"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email : </label>
                                                        <input type="email" class="form-control" id="employe_email" name="employe_email">
                                                        <small id="e_error" class="form-text text-muted"></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Mot de Passe : </label>
                                                        <input type="password" class="form-control" id="employe_password" name="employe_password">
                                                        <small id="pass1_error" class="form-text text-muted"></small>
                                                    </div>

                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Rentrer Le Mot de Passe : </label>
                                                        <input type="password" class="form-control" id="employe_pass2">
                                                        <small id="pass2_error" class="form-text text-muted"></small>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Adresse : </label>
                                                    <input type="text" class="form-control" id="employe_adresse" name="employe_adresse">
                                                    <small id="a_error" class="form-text text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Telephone : </label>
                                                        <input type="text" class="form-control" id="employe_tele" name="employe_tele">
                                                        <small id="t_error" class="form-text text-muted"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"></div>                         
                                                <div class="col-lg-6 text-right" >
                                                    <button type="submit" class="btn btn-primary ">Ajouter Employe</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <label align="right">Rechercher :</label>
                                <input type="text" id="search" class="form-control" placeholder="rechercher dans n'importe quel ordre">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <div class="form-group">
                                    <span class="form-control">Liste Des Employés</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class=" table table-responsive-md">
                                        <table class="table table-hover thead-dark table_search" border="0">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Nom</th>                                            
                                                    <th>Cin</th>
                                                    <th>Email</th>
                                                    <th>Adresse</th>
                                                    <th>Tele</th>
                                                    <th class="text-center">Operations</th>
                                                </tr>
                                            </thead>
                                            <tbody id="get_employe">
                                                <!--<tr>
                                                    <td>Uzumaki Naruto</td>                                            
                                                    <td>KO111111</td>
                                                    <td>NU@anim.com</td>
                                                    <td>Konoha, The hidden leaf village</td>
                                                    <td>9999999999</td>
                                                    <td>dattebayo</td>
                                                    <td colspan="2" class="text-center">
                                                        <button type="button" class="btn btn-primary ">Modifier</button>
                                                        <button type="button" class="btn btn-danger">supprimer</button>
                                                    </td>
                                                </tr>-->
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                            </div>
                        </div>

                    </div>
                </div>
            </div>




        </div>
    </div>

    <?php
    //Profil Form
    include_once("./modals/update_employe.php");
    ?>

</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

</html>
