$(document).ready(function () {
    var DOMAIN = "http://localhost/project_ff_admin";
    //Create Employe
    $("#employe_form").on("submit", function () {

        var statusp = false;
        var statusn = false;
        var statuse = false;
        var status = false;
        var statuscin = false;
        var statusa = false;
        var statust = false;
        var prenom = $("#employe_prenom");
        var nom = $("#employe_nom");
        var cin = $("#employe_cin");
        var email = $("#employe_email");
        var pass1 = $("#employe_password");
        var pass2 = $("#employe_pass2");
        var adresse = $("#employe_adresse");
        var telephone = $("#employe_tele");

        var email_patt = new RegExp(/^[A-Za-z0-9_-]+(\.[A-Za-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
        var tele_patt = new RegExp(/^[0]{1}[5,6,7]{1}[0-9]{8}$/);

        if (prenom.val() == "") {
            prenom.addClass("border-danger");
            $("#p_error").html("<span class='text-danger'>S'il vous plaît entrer le prenom </span>");
            statusp = false;
        } else {
            prenom.removeClass("border-danger");
            $("#p_error").html("");
            statusp = true;
        }
        if (nom.val() == "") {
            nom.addClass("border-danger");
            $("#n_error").html("<span class='text-danger'>S'il vous plaît entrer le nom </span>");
            statusn = false;
        } else {
            nom.removeClass("border-danger");
            $("#n_error").html("");
            statusn = true;
        }
        if (cin.val() == "") {
            cin.addClass("border-danger");
            $("#cin_error").html("<span class='text-danger'>S'il vous plaît entrer votre CIN </span>");
            statuscin = false;
        } else {
            cin.removeClass("border-danger");
            $("#cin_error").html("");
            statuscin = true;
        }
        if (!email_patt.test(email.val())) {
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Veuillez entrer une adresse email valide</span>");
            statuse = false;
        } else {
            email.removeClass("border-danger");
            $("#e_error").html("");
            statuse = true;
        }
        if (pass1.val() == "" || pass1.val().length < 8) {
            pass1.addClass("border-danger");
            $("#pass1_error").html("<span class='text-danger'>S'il vous plaît entrer plus de 8 chiffres mot de passe</span>");
            status = false;
        } else {
            pass1.removeClass("border-danger");
            $("#pass1_error").html("");
            status = true;
        }
        if (pass2.val() == "" || pass2.val().length < 8) {
            pass2.addClass("border-danger");
            $("#pass2_error").html("<span class='text-danger'>Entrer un mot de passe valide avec plue de 8 chiffres</span>");
            status = false;
        } else {
            pass2.removeClass("border-danger");
            $("#pass2_error").html("");
            status = true;
        }
        if (adresse.val() == "") {
            adresse.addClass("border-danger");
            $("#a_error").html("<span class='text-danger'>Veuillez entrer votre adresse</span>");
            statusa = false;
        } else {
            adresse.removeClass("border-danger");
            $("#a_error").html("");
            statusa = true;
        }
        if (!tele_patt.test(telephone.val())) {
            telephone.addClass("border-danger");
            $("#t_error").html("<span class='text-danger'>Veuillez entrer un numero de telephone valide</span>");
            statust = false;
        } else {
            telephone.removeClass("border-danger");
            $("#t_error").html("");
            statust = true;
        }
        if ((pass1.val() == pass2.val()) && status == true && statusp == true && statusn == true && statuscin == true && statuse == true && statusa == true && statust == true)
        {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#employe_form").serialize(),
                success: function (data) {
                    if (data == "EMAIL_ALREADY_EXISTS") {
                        alert("On dirait que ton email est déjà utilisé");
                    } else if (data == "SOME_ERROR") {
                        alert("Vérifier vos entrées s'il manque quelque chose");
                    } else {
                        alert("Employe Ajouter avec Succes");
                        window.location.href = "";
                    }
                }
            })
        } else {
            pass2.addClass("border-danger");
            $("#pass2_error").html("<span class='text-danger'>Le mot de passe n'est pas similaire à l'autre</span>");
            status = false;
        }

    })
//Login
    $("#form_login").on("submit", function () {
        var email = $("#log_email");
        var pass = $("#log_password");
        var status = false;
        if (email.val() == "") {
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>S'il vous plaît entrer l'adresse email</span>");
            status = false;
        } else {
            email.removeClass("border-danger");
            $("#e_error").html("");
            status = true;
        }
        if (pass.val() == "") {
            pass.addClass("border-danger");
            $("#p_error").html("<span class='text-danger'>Veuillez entrer le mot de passe</span>");
            status = false;
        } else {
            pass.removeClass("border-danger");
            $("#p_error").html("");
            status = true;
        }
        if (status) {
            $(".overlay").show();
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#form_login").serialize(),
                success: function (data) {
                    if (data == "NOT_REGISTERD") {
                        $(".overlay").hide();
                        email.addClass("border-danger");
                        $("#e_error").html("<span class='text-danger'>On dirait que tu n'es pas inscrit.</span>");
                    } else if (data == "PASSWORD_NOT_MATCHED") {
                        $(".overlay").hide();
                        pass.addClass("border-danger");
                        $("#p_error").html("<span class='text-danger'>S'il vous plaît entrer le mot de passe correct</span>");
                        status = false;
                    } else {
                        $(".overlay").hide();
                        console.log(data);
                        window.location.href = DOMAIN + "/dashboard.php";
                    }
                }
            })
        }
    })

    $("#ajouter_vehicule_form").on("submit", function () {
        var statusv = false;
        var vehicule = $("#modal_vehicule");

        if (vehicule.val() == "") {
            vehicule.addClass("border-danger");
            $("#nv_error").html("<span class='text-danger'>S'il vous plaît entrer le prenom </span>");
            statusv = false;
        } else {
            vehicule.removeClass("border-danger");
            $("#nv_error").html("");
            statusv = true;
        }

        if (statusv == true)
        {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#ajouter_vehicule_form").serialize(),
                success: function (data) {
                    if (data == "VEHICULE_ADDED") {
                        alert("Le Vehicule est ajouter avec succes.!");
                        window.location.href = "";
                    } else {
                        alert(data);
                    }
                }
            })
        }
    })

    //Create Livreur
    $("#ajouter_livreur_form").on("submit", function () {

        var statusp = false;
        var statusn = false;
        var statuscin = false;
        var statusa = false;
        var statust = false;
        var status = false;
        var nom = $("#nom_livreur");
        var prenom = $("#prenom_livreur");
        var cin = $("#cin_livreur");
        var telephone = $("#tele_livreur");
        var adresse = $("#adresse_livreur");


        var cin_patt = new RegExp(/^[A-Z]{2}[0-9]{6}$/);
        var tele_patt = new RegExp(/^[0]{1}[5,6,7]{1}[0-9]{8}$/);

        if (prenom.val() == "") {
            prenom.addClass("border-danger");
            $("#pl_error").html("<span class='text-danger'>S'il vous plaît entrer le prenom </span>");
            statusp = false;
        } else {
            prenom.removeClass("border-danger");
            $("#pl_error").html("");
            statusp = true;
        }
        if (nom.val() == "") {
            nom.addClass("border-danger");
            $("#nl_error").html("<span class='text-danger'>S'il vous plaît entrer le nom </span>");
            statusn = false;
        } else {
            nom.removeClass("border-danger");
            $("#nl_error").html("");
            statusn = true;
        }
        if (!cin_patt.test(cin.val())) {
            cin.addClass("border-danger");
            $("#cinl_error").html("<span class='text-danger'>Entrer une Valide CIN </span>");
            statuscin = false;
        } else {
            cin.removeClass("border-danger");
            $("#cinl_error").html("");
            statuscin = true;
        }
        if (adresse.val() == "") {
            adresse.addClass("border-danger");
            $("#al_error").html("<span class='text-danger'>Veuillez entrer Livreur adresse</span>");
            statusa = false;
        } else {
            adresse.removeClass("border-danger");
            $("#al_error").html("");
            statusa = true;
        }
        if (!tele_patt.test(telephone.val())) {
            telephone.addClass("border-danger");
            $("#tl_error").html("<span class='text-danger'>Veuillez entrer un numero de telephone valide</span>");
            statust = false;
        } else {
            telephone.removeClass("border-danger");
            $("#tl_error").html("");
            statust = true;
        }
        if (statusp == true && statusn == true && statuscin == true && statusa == true && statust == true)
        {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#ajouter_livreur_form").serialize(),
                success: function (data) {
                    if (data == "LIVREUR_ADDED") {
                        alert("Le Livreur est bien ajouter !");
                        window.location.href = "";
                    } else {
                        alert(data);
                    }
                }
            })
        }
    })

    //Fetch Plat Stat
    fetch_Plat_Stat();
    function fetch_Plat_Stat() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {statPlat: 1},
            success: function (data) {
                var stat = data;
                if(data * 1 < 10)
                {
                    stat = "0"+data;
                }
                $("#pl").html(stat);
            }
        })
    }

    //Fetch Command Stat
    fetch_Commande_Stat();
    function fetch_Commande_Stat() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {statCommande: 1},
            success: function (data) {
                var stat = data;
                if(data * 1 < 10)
                {
                    stat = "0"+data;
                }
                $("#cm").html(stat);
            }
        })
    }

    //Fetch Client Stat
    fetch_Client_Stat();
    function fetch_Client_Stat() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {statClient: 1},
            success: function (data) {
                var stat = data;
                if(data * 1 < 10)
                {
                    stat = "0"+data;
                }
                $("#cl").html(stat);
            }
        })
    }

    //Fetch sales
    fetch_Sales_Stat();
    function fetch_Sales_Stat() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {statSales: 1},
            success: function (data) {
                $("#sl").html(data);
            }
        })
    }
    
    //Commandes Count
    /*CommandesCount();
    function CommandesCount() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {commandeCount: 1},
            success: function (data) {
                //alert(data);
            }
        })
    }*/
    
    //Commandes Count
    CommandesCheck();
    function CommandesCheck() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {checkCommande: 1},
            success: function (data) {
                if(data == 1){
                    alert("Une commande a été ajoutée maintenant");
                }
            }
        })
    }


})