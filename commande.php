<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <!--<link rel="icon" type="image/png" href="assets/img/favicon.ico">-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>COMMANDES</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />




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
                        <li>
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
                            <a href="vehicule.php">
                                <i class="fas fa-shuttle-van"></i>
                                <p>Les Vehicules</p>
                            </a>
                        </li>

                        <li class="active">
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


                <div class="content">
                    <div class="container-fluid" >
                        <div class="content" >
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <div class="form-group">
                                            <span class="form-control">Liste Des Commandes</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class=" table table-responsive-md">
                                                <table class="table table-hover thead-dark" border="0">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>Nom de Plat</th>                                            
                                                            <th>Nom de Client</th>
                                                            <th>CIN</th>
                                                            <th>Quantite</th>
                                                            <th>Date de Commande</th>
                                                            <th>Nom de Livreur</th>
                                                            <th>Vehicule Utiliser</th>
                                                            <th>Etat de Livraison</th>
                                                            <th colspan="2" class="text-center">Operations</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Premier Plat</td>                                            
                                                            <td>Hamza Youssify</td>
                                                            <td>EE112233</td>
                                                            <td>12</td>
                                                            <td>02/05/2019</td>
                                                            <td>Meryem</td>
                                                            <td>Moto 1</td>
                                                            <td class="text-center"> 
                                                                <div class="alert alert-warning" role="alert">
                                                                    Sous Livraison
                                                                </div>
                                                            </td>
                                                            <td colspan="2" class="text-center">
                                                                <button type="button" class="btn btn-primary ">Modifier</button>
                                                                <button type="button" class="btn btn-danger">supprimer</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Premier Plat</td>                                            
                                                            <td>Hamza Youssify</td>
                                                            <td>EE112233</td>
                                                            <td>15</td>
                                                            <td>12/05/2019</td>
                                                            <td>chihad</td>
                                                            <td>Moto 2</td>
                                                            <td  class="text-center"> 
                                                                <div class="alert alert-success" role="alert">
                                                                    Livrer
                                                                </div>
                                                            </td>
                                                            <td colspan="2" class="text-center">
                                                                <button type="button" class="btn btn-primary ">Modifier</button>
                                                                <button type="button" class="btn btn-danger">supprimer</button>
                                                            </td>
                                                        </tr>
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




        </div>
    </div>


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