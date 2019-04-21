<?php
include_once("./database/constants.php");
if (isset($_SESSION["userid"])) {
    header("location:" . DOMAIN . "/dashboard.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="assets/css/fontawsomeforinputs.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link type="text/css" href="./css/loader.css" rel="stylesheet">
        <script type="text/javascript" src="./js/main.js"></script>
        <title>Login</title>
    </head>
    <body style="background-image: url('assets/img/neteat.jpg');background-repeat: no-repeat;background-size: cover;" >
        <div class="overlay"><div class="loader"></div></div>
        <!--
        <div class="container" style="background-color: red;background-image: url('work-back.jpg');background-repeat: no-repeat;background-size: cover;">
            <div class="row">
                <div class="col-lg-12"></div>
            </div>
        </div>
        -->
        <div>
            <br>
            <br>

        </div>

        <div class="card mx-auto border-0" style="width: 25rem;background-color: #f7f7f7;opacity: 0.9">
            <img class="card-img-top mx-auto" style="width:60%;margin-top:5%; " src="./icons/openid-logo.png" alt="Login Icon">
            <div class="card-body"  >
                <form id="form_login" onsubmit="return false">
                    <!--<div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="log_email" id="log_email" placeholder="Entrer Votre Email">
                        <small id="e_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"><i class="fa fa-lock">&nbsp;</i>Mot de passe</label>
                        <input type="password" class="form-control" name="log_password" id="log_password" placeholder="Entre Le Mot de Passe">
                        <small id="p_error" class="form-text text-muted"></small>
                    </div>
                    -->
                    <div class="inputWithIcon inputIconBg">
                        <input type="text" placeholder="Entrer Votre Email" id="log_email" name="log_email">
                        <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
                        <small id="e_error" class="form-text text-muted"></small>
                    </div>

                    <div class="inputWithIcon inputIconBg">
                        <input type="password" placeholder="Entre Le Mot de Passe" id="log_password" name="log_password">
                        <i class="fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>
                        <small id="p_error" class="form-text text-muted"></small>
                    </div>
                    <div class="row">

                        <div class="form-group form-check col-md-6" style="margin-left: 4%;">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
                        </div>
                        <div class="form-group col-md-5"><a href="#" style="font-size: 14px;">Mot de Passe oublié?</a></div>
                        <!--<div class=""></div>-->
                    </div>

                    <div class="row">
                        <div class="col-md-3"></div> 
                        <button type="submit" class="btn btn-primary col-md-6">Connexion</button>
                        <div class="col-md-3"></div>
                    </div>
                </form>
            </div>

        </div>
    </body>


</html>
