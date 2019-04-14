$(document).ready(function () {
    //alert('Hello Plat Page');

    $.ajax({
        url: 'control/chargePlat.php',
        data: {id: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            remplir(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });

    function remplir(data) {
        var contenu = $('#container');
        var ligne = "";
        for (i = 0; i < data.length; i++) {
         //   ligne += '<tr><td><img class="img-circle" src="photos\\' + data[i].photo + '" width="50" height="50" /><td>' + data[i].nom + '</td><td>' + data[i].prix + '</td><td class="text-center"><button class="btn btn-primary" indice="' + data[i].id + '">Modifer</button><button class="btn btn-danger" indice="' + data[i].id + '">Supprimer</button></td></tr>';
            ligne += '<tr><td><img class="img-circle" src="photos\\' + data[i].photo + '" width="50" height="50" /><td>' + data[i].nom + '</td><td>' + data[i].prix + '</td><td class="text-center"><button class="btn btn-primary" indice="' + data[i].id + '">Modifier</button>&nbsp;<button class="btn btn-danger" indice="' + data[i].id + '">Supprimer</button></td></tr>';
        }
        contenu.html(ligne);
    }



    $('#container').on('click', '.btn-danger', function () {
        var conf = confirm("voulez-vous vraiment supprimer ?");
        if (conf) {
            var id = $(this).attr('indice');
            //$('#nom').val(id);
            $.ajax({
                url: 'control/removePlat.php',
                data: {id: id},
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    remplir(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            });
        }
    });



    $('#container').on('click', '.btn-primary', function () {
        var id = $(this).attr('indice');
        $('#idSaver').val($(this).attr('indice'));
        $('#add').html('Modifier plat');
        
        //$('#ctn').css("background-color", "yellow");
       // $('html, #ctn').animate({scrollTop:0},800);
       // alert('up');
        
        $.ajax({
            url: 'control/loadPlat.php',
            data: {id: id},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                $('#nom').val(data.nom);
                $('#description').val(data.description);
                $('#prix').val(data.prix);
                //$('#photoP').val(data.photo);
              //  alert($('#photoP').val());
                $('#preview').attr('src', 'photos\\' + data.photo);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });

    });




});