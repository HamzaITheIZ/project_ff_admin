<?php ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
        <link rel="stylesheet" type="text/css" href="./css/chart.css">
    </head>
    <body>
        <!--<br><br><br>
        <div class="container">
            <form id="nomSubmit" onsubmit="return false;">
                <div class="form-group">
                    <label>Donner Votre Nom :</label>
                    <input type="text" class="form-control" placeholder="Nom" id="nom">
                    <div id="feedback">

                    </div>
                    <br>
                    <input type="submit" value="Valider" class="btn btn-success">
                </div>
            </form>
        </div>
    </body>
    <script>
        $(document).ready(function () {

            $("#nomSubmit").on("submit", function () {
                var nom = $("#nom");

                if (nom.val() == "")
                {
                    nom.addClass("is-invalid");
                    $("#feedback").html("Donner Un Nom SVP!");
                    $("#feedback").addClass("invalid-feedback");
                } else {
                    nom.removeClass("is-invalid");
                    $("#feedback").removeClass("invalid-feedback");
                    nom.addClass("is-valid");
                    $("#feedback").html("Bravo!");
                    $("#feedback").addClass("valid-feedback");
                }
            })
        })
    </script>-->
        <section>
            <div class="box">
                <div class="skill">
                    <div class="graph" style="height: 50%">
                        <div class="percent">50%</div>
                    </div>
                    <div class="name">HTML</div>
                </div>
                <div class="skill">
                    <div class="graph" style="height: 80%">
                        <div class="percent">80%</div>
                    </div>
                    <div class="name">CSS</div>
                </div>
                <div class="skill">
                    <div class="graph" style="height: 30%">
                        <div class="percent">30%</div>
                    </div>
                    <div class="name">JS</div>
                </div>
            </div>
        </section>
    </body>

</html>
