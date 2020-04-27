/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "preventDuplicates": false,
        "positionClass": "toast-top-left",
        "onclick": null,
        "showDuration": "4000",
        "hideDuration": "4000"
    }

    toastr.success('Bienvenue dans l\'interface de création de comité', 'BIENVENUE'); //le test du plugin de l'alerte


    //alert("bonjour le jour");



});



function validerformulaire() {

    $('#formComite').submit(function (e) {
        //alert('submit intercepted');
        e.preventDefault(e);

        $.ajax({

            url: $('#formComite').attr('action'),
            data: $('#formComite').serialize(),
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "preventDuplicates": false,
                    "positionClass": "toast-top-right",
                    "onclick": null,
                    "showDuration": "4000",
                    "hideDuration": "4000",
                    "onHidden": function () {
                        window.location.href = "Liste_Comite";
                    }
                }

                toastr.success('Enregistrement des données reussies', 'MISE A JOUR DES DONNÉES'); //le test du plugin de l'alerte

            },
            error: function (jqXHR, textStatus, errorThrown) {

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "preventDuplicates": false,
                    "positionClass": "toast-top-right",
                    "onclick": null,
                    "showDuration": "4000",
                    "hideDuration": "4000"
                }

                toastr.warning('Echec de l\'enregistrement des données reussies', 'MISE A JOUR DES DONNÉES'); //le test du plugin de l'alerte

            }

        })
    });


}