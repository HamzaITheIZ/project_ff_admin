$(document).ready(function () {
    var DOMAIN = "http://localhost/project_ff_admin";

    //Fill Employes
    manageEmploye();
    function manageEmploye() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {manageEmploye: 1},
            success: function (data) {
                $("#get_employe").html(data);
            }
        })
    }


    //Delete Employe
    $("body").delegate(".del_user", "click", function () {
        var did = $(this).attr("did");
        if (confirm("Êtes-vous sûr ? Vous voulez supprimer!")) {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: {deleteUser: 1, id: did},
                success: function (data) {
                    if (data == "DELETED") {
                        alert("L'Employe est supprimé");
                        manageEmploye();
                    } else {
                        alert(data);
                    }

                }
            })
        }
    })

    //Fill for update employe
    $("body").delegate(".edit_user", "click", function () {
        var eid = $(this).attr("eid");
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            dataType: "json",
            data: {updateUser: 1, id: eid},
            success: function (data) {
                console.log(data);
                $("#id").val(data["id"]);
                $("#modal_enom").val(data["nom"]);
                $("#modal_ecin").val(data["cin"]);
                $("#modal_eadresse").val(data["adresse"]);
                $("#modal_etele").val(data["telephone"]);
                $("#urole").val(data["role"]);
            }
        })
    })

    //Update Employe
    $("#update_employe_form").on("submit", function () {
        var statusn = false;
        var statuscin = false;
        var statusa = false;
        var statust = false;
        var statusr = false;

        var nom = $("#modal_enom");
        var cin = $("#modal_ecin");
        var adresse = $("#modal_eadresse");
        var tele = $("#modal_etele");
        var role = $("#urole");

        var tele_patt = new RegExp(/^[0]{1}[5,6,7]{1}[0-9]{8}$/);

        if (nom.val() == "") {
            nom.addClass("border-danger");
            $("#mn_error").html("<span class='text-danger'>S'il vous plaît entrer le prenom </span>");
            statusn = false;
        } else {
            nom.removeClass("border-danger");
            $("#mn_error").html("");
            statusn = true;
        }
        if (cin.val() == "") {
            cin.addClass("border-danger");
            $("#mcin_error").html("<span class='text-danger'>S'il vous plaît entrer votre CIN </span>");
            statuscin = false;
        } else {
            cin.removeClass("border-danger");
            $("#mcin_error").html("");
            statuscin = true;
        }
        if (adresse.val() == "") {
            adresse.addClass("border-danger");
            $("#ma_error").html("<span class='text-danger'>Veuillez entrer votre adresse</span>");
            statusa = false;
        } else {
            adresse.removeClass("border-danger");
            $("#ma_error").html("");
            statusa = true;
        }
        if (!tele_patt.test(tele.val())) {
            tele.addClass("border-danger");
            $("#mt_error").html("<span class='text-danger'>Veuillez entrer un numero de telephone valide</span>");
            statust = false;
        } else {
            tele.removeClass("border-danger");
            $("#mt_error").html("");
            statust = true;
        }
        if (role.val() == "") {
            role.addClass("border-danger");
            $("#ur_error").html("<span class='text-danger'>veuillez sélectionner un rôle</span>");
            statusr = false;
        } else {
            role.removeClass("border-danger");
            $("#ur_error").html("");
            statusr = true;
        }

        if (statusn == true && statuscin == true && statusa == true && statust == true && statusr == true)
        {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#update_employe_form").serialize(),
                success: function (data) {
                    if (data == "UPDATED") {
                        alert("L'Employe est modifier avec succès.!");
                        window.location.href = "";
                    } else {
                        alert(data);
                    }
                }
            })
        } else {
            alert("Votre entries est invalide!");
        }
    })

    //Fill Commandes
    fillCommande();
    function fillCommande() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {manageCommande: 1},
            success: function (data) {
                $("#get_commande").html(data);
            }
        })
    }

    //Delete Commande
    $("body").delegate(".del_commande", "click", function () {
        var did = $(this).attr("did");
        if (confirm("Êtes-vous sûr ? Vous voulez supprimer!")) {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: {deleteCommande: 1, id: did},
                success: function (data) {
                    if (data == "DELETED") {
                        alert("La Commande est supprimé avec Succès");
                        fillCommande();
                    } else {
                        alert(data);
                    }

                }
            })
        }
    })
    //Show Update Imformations 
    $("body").delegate(".showup", "click", function () {
        $("#select_liv").attr("disabled", false);
        $("#select_veh").attr("disabled", false);
        $("#select_etat").attr("disabled", true);
        $("#updateinfo").css("display", "none");
        $("#mje").css("display", "none");
        $("#md").css("display", "block");
    })

    //Fill for update Commande
    $("body").delegate(".edit_commande", "click", function () {
        var eid = $(this).attr("eid");
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            dataType: "json",
            data: {updateCommande: 1, id: eid},
            success: function (data) {
                console.log(data);
                //alert(data["etatLivraison"]);
                if (data["etatLivraison"] == "Livré") {
                    $("#select_liv").attr("disabled", true);
                    $("#select_veh").attr("disabled", true);
                    $("#select_etat").attr("disabled", true);
                    $("#updateinfo").css("display", "none");
                    $("#md").css("display", "none");
                    $("#mj").css("display", "none");
                } else if (data["livreurCommande"] != null) {
                    $("#select_liv").attr("disabled", true);
                    $("#select_veh").attr("disabled", true);
                    $("#select_etat").attr("disabled", false);
                    $("#updateinfo").css("display", "block");
                    $("#md").css("display", "none");
                    $("#mj").css("display", "none");
                    $("#mje").css("display", "block");
                } else {
                    $("#select_liv").attr("disabled", false);
                    $("#select_veh").attr("disabled", false);
                    $("#select_etat").attr("disabled", false);
                    $("#updateinfo").css("display", "none");
                    $("#md").css("display", "none");
                    $("#mj").css("display", "block");
                    $("#mje").css("display", "none");
                }
                $("#id").val(data["id"]);
                $("#select_liv").val(data["livreurCommande"]);
                $("#select_veh").val(data["vehiculeUtiliser"]);
                $("#select_etat").val(data["etatLivraison"]);
            }
        })
    })

    //Update Commande
    $("#update_commande_form").on("submit", function () {
        var statusl = false;
        var statusv = false;

        var cid = $("#id");
        var livreur = $("#select_liv");
        var vehicule = $("#select_veh");
        var etat = $("#select_etat");
        var btn1 = $("#mj");
        var btn2 = $("#mje");
        var btn3 = $("#md");

        if (livreur.val() == "") {
            livreur.addClass("border-danger");
            $("#l_error").html("<span class='text-danger'>Veuillez sélectionner Un Livreur</span>");
            statusl = false;
        } else {
            livreur.removeClass("border-danger");
            $("#l_error").html("");
            statusl = true;
        }
        if (vehicule.val() == "") {
            vehicule.addClass("border-danger");
            $("#v_error").html("<span class='text-danger'>Veuillez sélectionner Un Vehicule</span>");
            statusv = false;
        } else {
            vehicule.removeClass("border-danger");
            $("#v_error").html("");
            statusv = true;
        }

        if (btn1.css("display") == "block") {
            if (statusl == true && statusv == true)
            {
                $.ajax({
                    url: DOMAIN + "/includes/process.php",
                    method: "POST",
                    data: $("#update_commande_form").serialize(),
                    success: function (data) {
                        if (data == "UPDATED") {
                            alert("La Commande est modifier avec succès.!");
                            window.location.href = "";
                        } else {
                            alert(data);
                        }
                    }
                })
            } else {
                alert("Votre entries est invalide!");
            }
        } else if (btn2.css("display") == "block") {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: {UpdateEtat: 1, etat: etat.val(), cid: cid.val()},
                success: function (data) {
                    if (data == "UPDATED") {
                        alert("L'Etat est bien modifier.!");
                        window.location.href = "";
                    } else {
                        alert(data);
                    }
                }
            })
        } else {
            if (statusl == true && statusv == true) {
                $.ajax({
                    url: DOMAIN + "/includes/process.php",
                    method: "POST",
                    data: {UpdateLivraison: 1, livreur: livreur.val(), vehicule: vehicule.val(), cid: cid.val()},
                    success: function (data) {
                        if (data == "UPDATED") {
                            alert("Livraison Informations est Modifié avec succès!");
                            window.location.href = "";
                        } else {
                            alert(data);
                        }
                    }
                })
            } else {
                alert("Votre entries est invalide!");
            }
        }
    })

    //Fetch Livreur
    fetch_livreur();
    function fetch_livreur() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {getLivreur: 1},
            success: function (data) {
                var choose = "<option value=''>Select Livreur</option>";
                $("#select_liv").html(choose + data);
            }
        })
    }

    //Fetch Vehicule
    fetch_vehicule();
    function fetch_vehicule() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {getVehicule: 1},
            success: function (data) {
                var choose = "<option value=''>Select Vehicule</option>";
                $("#select_veh").html(choose + data);
            }
        })
    }


    //Fill Vehicule
    fillVehicule();
    function fillVehicule() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {manageVehicule: 1},
            success: function (data) {
                $("#get_vehicule").html(data);
            }
        })
    }

    //Delete Vehicule
    $("body").delegate(".del_vehicule", "click", function () {
        var did = $(this).attr("did");
        if (confirm("Êtes-vous sûr ? Vous voulez supprimer!")) {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: {deleteVehicule: 1, id: did},
                success: function (data) {
                    if (data == "DELETED") {
                        alert("Le Vehicule est supprimé avec Succès");
                        fillVehicule();
                    } else {
                        alert("Cet Vehicule est Utiliser tu ne peut pas le Supprimer!");
                    }

                }
            })
        }
    })

    //Fill for update Vehicule
    $("body").delegate(".edit_vehicule", "click", function () {
        var eid = $(this).attr("eid");
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            dataType: "json",
            data: {updateVehicule: 1, id: eid},
            success: function (data) {
                console.log(data);
                $("#id").val(data["id"]);
                $("#select_vetat").val(data["etat"]);
                $("#num_vehicule").val(data["numeroVehicule"]);
            }
        })
    })

    //Update Vehicule
    $("#update_vehicule_form").on("submit", function () {

        var statusv = true;
        var vehicule = $("#num_vehicule");

        if (vehicule.val() == "") {
            vehicule.addClass("border-danger");
            $("#vn_error").html("<span class='text-danger'>Veuillez Donner Le numero de Vehicule</span>");
            statusv = false;
        } else {
            vehicule.removeClass("border-danger");
            $("#vn_error").html("");
            statusv = true;
        }

        if (statusv == true)
        {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#update_vehicule_form").serialize(),
                success: function (data) {
                    if (data == "UPDATED") {
                        alert("La Vehicule est modifier avec succès.!");
                        window.location.href = "";
                    } else {
                        alert(data);
                    }
                }
            })
        }
    })

    //Fill CLients
    fillClient();
    function fillClient() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {manageClient: 1},
            success: function (data) {
                $("#get_client").html(data);
            }
        })
    }

    //Delete Clients
    $("body").delegate(".del_client", "click", function () {
        var did = $(this).attr("did");
        if (confirm("Êtes-vous sûr ? Vous voulez supprimer!")) {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: {deleteClient: 1, id: did},
                success: function (data) {
                    if (data == "DELETED") {
                        alert("Le Client est bien supprimé!");
                        fillClient();
                    } else {
                        alert(data);
                    }

                }
            })
        }
    })

    //Fill Livreurs
    fillLivreur();
    function fillLivreur() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {manageLivreur: 1},
            success: function (data) {
                $("#get_livreur").html(data);
            }
        })
    }

    //Delete Livreur
    $("body").delegate(".del_livreur", "click", function () {
        var did = $(this).attr("did");
        if (confirm("Êtes-vous sûr ? Vous voulez supprimer!")) {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: {deleteLivreur: 1, id: did},
                success: function (data) {
                    if (data == "DELETED") {
                        alert("Le Livreur est bien supprimé");
                        fillLivreur();
                    } else {
                        alert("Cet Livreur est en travail tu ne peut pas le Supprimer!");
                    }

                }
            })
        }
    })

    //Fill for update Livreur
    $("body").delegate(".edit_livreur", "click", function () {
        var eid = $(this).attr("eid");
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            dataType: "json",
            data: {updateLivreur: 1, id: eid},
            success: function (data) {
                console.log(data);
                $("#id").val(data["id"]);
                $("#unom_livreur").val(data["nom"]);
                $("#ucin_livreur").val(data["cin"]);
                $("#uadresse_livreur").val(data["adresse"]);
                $("#utele_livreur").val(data["telephone"]);
                $("#etat_livreur").val(data["etat"]);
            }
        })
    })
    //Update Livreur
    $("#update_livreur_form").on("submit", function () {

        var statusp = false;
        var statusn = false;
        var statuscin = false;
        var statusa = false;
        var statust = false;
        var status = false;
        var nom = $("#unom_livreur");
        var prenom = $("#uprenom_livreur");
        var cin = $("#ucin_livreur");
        var telephone = $("#utele_livreur");
        var adresse = $("#uadresse_livreur");
        var etat = $("#etat_livreur");


        var cin_patt = new RegExp(/^[A-Z]{2}[0-9]{6}$/);
        var tele_patt = new RegExp(/^[0]{1}[5,6,7]{1}[0-9]{8}$/);

        if (prenom.val() == "") {
            prenom.addClass("border-danger");
            $("#upl_error").html("<span class='text-danger'>S'il vous plaît entrer le prenom </span>");
            statusp = false;
        } else {
            prenom.removeClass("border-danger");
            $("#upl_error").html("");
            statusp = true;
        }
        if (nom.val() == "") {
            nom.addClass("border-danger");
            $("#unl_error").html("<span class='text-danger'>S'il vous plaît entrer le nom </span>");
            statusn = false;
        } else {
            nom.removeClass("border-danger");
            $("#unl_error").html("");
            statusn = true;
        }
        if (!cin_patt.test(cin.val())) {
            cin.addClass("border-danger");
            $("#ucinl_error").html("<span class='text-danger'>Entrer une Valide CIN </span>");
            statuscin = false;
        } else {
            cin.removeClass("border-danger");
            $("#ucinl_error").html("");
            statuscin = true;
        }
        if (adresse.val() == "") {
            adresse.addClass("border-danger");
            $("#ual_error").html("<span class='text-danger'>Veuillez entrer Livreur adresse</span>");
            statusa = false;
        } else {
            adresse.removeClass("border-danger");
            $("#ual_error").html("");
            statusa = true;
        }
        if (!tele_patt.test(telephone.val())) {
            telephone.addClass("border-danger");
            $("#utl_error").html("<span class='text-danger'>Veuillez entrer un numero de telephone valide</span>");
            statust = false;
        } else {
            telephone.removeClass("border-danger");
            $("#utl_error").html("");
            statust = true;
        }
        if (etat.val() == "") {
            etat.addClass("border-danger");
            $("#el_error").html("<span class='text-danger'>Veuillez Choisir Un Etat</span>");
            status = false;
        } else {
            etat.removeClass("border-danger");
            $("#el_error").html("");
            status = true;
        }
        if (status == true && statusp == true && statusn == true && statuscin == true && statusa == true && statust == true)
        {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#update_livreur_form").serialize(),
                success: function (data) {
                    if (data == "UPDATED") {
                        alert("Le Livreur est modifier avec succès.!");
                        window.location.href = "";
                    } else {
                        alert(data);
                    }
                }
            })
        }
    })
    //Fill Livraison
    fillLivraison();
    function fillLivraison() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {fillLivraison: 1},
            success: function (data) {
                $("#livraison").html(data);
            }
        })
    }

    $("#search").keyup(function () {
        search_table($(this).val());
    })

    function search_table(value) {
        $(".table_search tr").each(function () {
            var found = "false";
            $(this).each(function () {
                if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                    found = "true";
                }
            })
            if (found == "true")
            {
                $(this).show();
            } else
            {
                $(this).hide();
            }
        })
    }
})