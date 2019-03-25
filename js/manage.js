$(document).ready(function () {
    var DOMAIN = "http://localhost/project_ff_admin";

    //Fill Employes
    manageUser();
    function manageUser() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {manageUser: 1},
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
                        manageUser(1);
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



            }
        })
    })

    //Update Employe
    $("#update_employe_form").on("submit", function () {
        var statusn = false;
        var statuscin = false;
        var statusa = false;
        var statust = false;

        var nom = $("#modal_enom");
        var cin = $("#modal_ecin");
        var adresse = $("#modal_eadresse");
        var tele = $("#modal_etele");

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

        if (statusn == true && statuscin == true && statusa == true && statust == true)
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

})