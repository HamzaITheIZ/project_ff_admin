<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <!--<link rel="icon" type="image/png" href="assets/img/favicon.ico">-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>PLATS</title>

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
        <style>
            #yourBtn{

                font-family: calibri;
                width: 150px;
                padding: 10px;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border: 1px dashed #BBB; 
                text-align: center;
                background-color: #DDD;
                cursor:pointer;
            }
        </style>
        <script type="text/javascript">
            function getFile() {
                document.getElementById("upfile").click();
            }
            function sub(obj) {
                var file = obj.value;
                var fileName = file.split("\\");
                document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
                event.preventDefault();
            }
        </script>

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
                        <li class="active">
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

                        <li>
                            <a href="commande.php">
                                <i class="far fa-newspaper"></i>
                                <p>commandes</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="main-panel">
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
                    <div class="container-fluid" >
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="content">
                                        <form >
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nom de Plat : </label>
                                                        <input type="text" class="form-control" required="" rows="4">

                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Prix de Plat : </label>
                                                        <input type="text" class="form-control" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Description de Plat : </label>
                                                        <textarea class="form-control" required="">
                                                            
                                                        </textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Photo de Plat : </label>

                                                        <div id="yourBtn" onclick="getFile()">Cliquer pour choisir un fichier</div>
                                                        <div style='height: 0px;width: 0px; overflow:hidden;'><input id="upfile" type="file" value="upload" onchange="sub(this)"/></div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6"></div>                         
                                                <div class="col-lg-6 text-right" >
                                                    <button type="submit" class="btn btn-primary ">Ajouter Plat</button>
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
                            <div class="col-sm-8 text-center">
                                <div class="form-group">
                                    <span class="form-control">Liste Des Employés</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class=" table table-responsive-md">
                                        <table class="table table-hover thead-dark" border="0">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Photo</th>                                            
                                                    <th>Nom de Plat</th>
                                                    <th>Prix</th>
                                                    
                                                    <th class="text-center">Operations</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img class="img-circle" src="burger.jpg" width="50" height="50">
                                                    </td>                                            
                                                    <td>Login Image</td>
                                                    <td>1500</td>
                                                    
                                                    <td class="text-center">
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