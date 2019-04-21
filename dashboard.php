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

        <title>STATISTIQUES</title>

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
        <link rel="stylesheet" href="./css/titles.css">
        <script type="text/javascript" src="./js/main.js"></script>

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
                        <li class="active">
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
                                    <a href="logout.php">
                                        Log out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>


                <div class="content" >
                    <div class="container-fluid" >
                        <!-- begin of my test-->
                        <div class="row">
                            <!--                            <div class="col-md-4 card" style="background-color: transparent;height: 300px;">
                                                            <div >
                                                                <div>
                                                                    <h3 class="text-info">Plats</h3>
                                                                    <div>
                                                                        <div>
                                                                            <div >
                                                                                <span ></span>
                                                                                <span>Nombre de plats vendé le mois blabla</span>
                                                                            </div>
                            
                                                                        </div>
                                                                        <div>
                                                                            <div >
                                                                                <span >
                                                                                    <i ></i>UP or Down</span>
                                                                                <span >4000</span>
                                                                            </div>
                            
                                                                        </div>
                                                                        <div>
                                                                            <div >
                                                                                <span ></span>
                                                                                <span>Plats plus vendé</span>
                                                                            </div>
                            
                                                                        </div>
                                                                        <div>
                                                                            <div >
                                                                                <span >
                                                                                    <i ></i>44%</span>
                                                                                <span >plat1</span>
                                                                            </div>
                                                                            <div >
                                                                                <span >
                                                                                    <i ></i>20%</span>
                                                                                <span >plat2</span>
                                                                            </div>
                                                                            <div >
                                                                                <span >
                                                                                    <i ></i>11%</span>
                                                                                <span >plat3</span>
                                                                            </div>
                                                                        </div>
                            
                                                                    </div>
                                                                    <div class="recent-report__chart"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                                        <canvas id="recent-rep-chart" height="449" width="700" class="chartjs-render-monitor" style="display: block; width: 700px; height: 449px;"></canvas>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>-->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="header">
                                        <h3 class="title">Statistiques des plats</h3>
                                        <p class="category">Les 3 plats plus vendé ce mois</p>
                                    </div>
                                    <div class="content">
                                        <div id="chartPreferences" class="ct-chart ct-perfect-fourth">
                                            <svg  width="100%" height="100%" class="ct-chart-pie" style="width: 100%; height: 100%;">
                                            <g class="ct-series ct-series-c">
                                            <path d="M349.5,5A117.5,117.5,0,0,0,305.864,13.403L349.5,122.5Z" class="ct-slice-pie" ct:value="6"></path>
                                            </g>
                                            <g class="ct-series ct-series-b">
                                            <path d="M306.245,13.251A117.5,117.5,0,0,0,269.365,208.434L349.5,122.5Z" class="ct-slice-pie" ct:value="32"></path>
                                            </g>
                                            <g class="ct-series ct-series-a">
                                            <path d="M269.066,208.154A117.5,117.5,0,1,0,349.5,5L349.5,122.5Z" class="ct-slice-pie" ct:value="30"></path>
                                            </g>

                                            <g>
<!--                                            <text dx="404.1243685459348" dy="144.12731747022482" text-anchor="middle" class="ct-label">42%</text>
                                            <text dx="291.7906240196895" dy="111.49134776808874" text-anchor="middle" class="ct-label">31%</text>
                                            <text dx="338.49134776808864" dy="64.79062401968955" text-anchor="middle" class="ct-label">6%</text>-->
                                            </g>
                                            </svg>
                                        </div>

                                        <div class="footer">
                                            <div class="legend">
                                                <i class="fa fa-circle text-info"></i> Plat1
                                                <i class="fa fa-circle text-danger"></i> Plat2
                                                <i class="fa fa-circle text-warning"></i> Plat3
                                            </div>
                                            <hr>
                                            <div class="stats">
                                                <i class="fa fa-clock-o"></i> Nombre totale des plats vendé: <b id="sl"></b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="header">
                                        <h3 class="title ">Autre statistiques </h3>
                                        <ul class="list">
                                            <li>

                                                <h4><i class="fa fa-circle "style="color:red;"></i> Totale de commandes</h4>
                                                <ul class="list">
                                                    <li class=""><h5 id="cm"></h5></li>
                                                </ul>
                                            </li> 
                                            <li>

                                                <h4><i class="fa fa-circle "style="color:red;"></i> Nombre Totale de plats</h4>
                                                <ul class="list">
                                                    <h5 id="pl"></h5>
                                                </ul>
                                            </li> 
                                            <li>

                                                <h4><i class="fa fa-circle "style="color:red;"></i> Nombre Totale de clients</h4>
                                                <ul class="list">
                                                    <li class=""><h5 id="cl"></h5></li>
                                                </ul>
                                            </li> 
                                            </u>
                                    </div>
                                    <div class="footer">

                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-clock-o"></i> Nombre de visites ce mois : <b>4000</b>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--end of my test-->
                    </div>
                </div>
            </div>

        </div>


    </body>
    <style>
        .list{
            list-style: none;

        }
        .list1{
            list-style: square;
        }
    </style>

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