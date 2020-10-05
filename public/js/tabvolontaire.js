/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {

    //alert("bonjour");
    selectRow();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "preventDuplicates": false,
        "positionClass": "toast-top-left",
        "onclick": null,
        "showDuration": "40000",
        "hideDuration": "4000"
    }

    toastr.success('Bienvenue dans l\'interface de création de volontaire', 'BIENVENUE'); //le test du plugin de l'alerte
})

function selectRow() {

    /*$('#tbodyTabVolont tr').click(function(){
     
     //        $(this).css("background-color","red");
     
     $('#tbodyTabVolont tr').css("background-color","");
     $(this).css("background-color","red");
     alert($('this #immatVol'));
     })*/
}


function removeVolontaire(persnumat) {

    $.confirm({
//        title: '<p style="color: #c40b4c"><Strong>ALERTE</strong></p>!',
//        content: '<p style="color:#056365"> Voulez vous saisir un autre volontaire ?</p>',
        type: 'red',
        title: 'ALERTE',
        content: 'Voulez vous vraiment supprimer ce volontaire ?',
        icon: 'fa fa-warning',
        theme: 'modern',
        buttons: {
            confirm: {
                text: 'OUI',
                btnClass: 'btn-danger',
                action: function () {
                    //alert(persnumat);
                    $.ajax({
                        url: '/removeVolontaire',
                        //          url: $('$form').attr('action'),
                        type: 'POST',
                        data: {
                            'idVolontaire': persnumat
                        },
                        success: function (data, textStatus, jqXHR) {

                            //console.log(JSON.stringify(data));
                            if (data == "succes") {

                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "progressBar": true,
                                    "preventDuplicates": false,
                                    "positionClass": "toast-top-right",
                                    "onclick": null,
                                    "showDuration": "400",
                                    "hideDuration": "1000",
                                    "timeOut": "7000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut",
                                    "onHidden": function () {
                                            window.location.href = '/Liste_Volontaire';
                                    }
                                },
                                        toastr.success('Enregistrement effectué avec succès', 'ACTUALISATION DES DONNÉES');
                            } else {

                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "progressBar": true,
                                    "preventDuplicates": false,
                                    "positionClass": "toast-top-right",
                                    "onclick": null,
                                    "showDuration": "400",
                                    "hideDuration": "1000",
                                    "timeOut": "7000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut",
                                    "onHidden": function () {

                                    }
                                },
                                    toastr.warning('Un erreur est survenue au moment de l\'enregistrement', 'ACTUALISATION DES DONNÉES');
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {

                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "progressBar": true,
                                "preventDuplicates": false,
                                "positionClass": "toast-top-right",
                                "onclick": null,
                                /*"showDuration": "400",
                                 "hideDuration": "1000",
                                 "timeOut": "7000",
                                 "extendedTimeOut": "1000",*/
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                "onHidden": function () {

                                }
                            },
                                    toastr.error('Un problème est survenue sur le serveurn contacter l\'administrateur', 'ALERTE');
                        }

                    });
                }
            },
            /*cancel: function () {
             $.alert('Canceled!');
             },*/
            cancel: {
                text: 'NON',
                btnClass: 'btn-blue',
                keys: ['enter', 'shift'],
                action: function () {
                    //window.location.href = '/Liste_Volontaire';
                }
            }
        }
    });
}