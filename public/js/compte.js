$(function () {

    /*$.niftyNoty({
     type: 'success',
     container: 'floating',
     title: 'DONNEES  ENREGISTRÉES',
     message: "L'enregistrement a été effectué avec succès",
     closeBtn: true,
     timer: 0
     });*/
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

    toastr.success('Bienvenue dans l\'interface de création de volontaire', 'BIENVENUE'); //le test du plugin de l'alerte


    $('#gererCompte').bootstrapValidator({

        message: 'This value is not valid',
        live: 'enabled',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {

            login: {
                message: 'Veuillez svp saisir le login svp',
                feedbackIcons: true,
                trigger: 'keyup',
                validators: {
                    notEmpty: {
                        message: 'Veuillez svp saisir le login svp'
                    }
                    /*regexp: {
                     regexp: /^[a-zA-Z0-9_]+$/,
                     message: 'The username can only consist of alphabetical, number and underscore'
                     }*/
                }
            },
            motdepasse: {
                message: 'Veuillez svp saisir le mot de passe',
                feedbackIcons: true,
                trigger: 'keyup',
                validators: {
                    notEmpty: {
                        message: 'Veuillez svp saisir le mot de passe svp'
                    },
                    stringLength: {
                        min:8,
                        message: 'Le mot de passe doit contenir au moins 8 caractères'
                    },
                    identical: {
                        field: 'cfmotdepasse',
                        message: ' Confirmez le mot de passe svp'
                    }
                    /*regexp: {
                     regexp: /^[a-zA-Z0-9_]+$/,
                     message: 'The username can only consist of alphabetical, number and underscore'
                     }*/
                }
            },
            cfmotdepasse: {
                message: 'Veuillez svp saisir le mot de passe',
                feedbackIcons: true,
                trigger: 'keyup',
                validators: {
                    notEmpty: {
                        message: 'Veuillez svp saisir le mot de passe svp'
                    },
                    identical: {
                        field: 'motdepasse',
                        message: ' Confirmez le mot de passe svp'
                    }
                    /*regexp: {
                     regexp: /^[a-zA-Z0-9_]+$/,
                     message: 'The username can only consist of alphabetical, number and underscore'
                     }*/
                }
            }
        }
    }).on('success.form.bv', function (e) {
// Prevent form submission
        e.preventDefault();
        // Get the form instance
        var $form = $(e.target);
        // Get the BootstrapValidator instance
        var bv = $form.data('bootstrapValidator');
        // Use Ajax to submit form data
        /*$.post($form.attr('action'), $form.serialize(), function(result) {
         // ... Process the result ...
         }, 'json');*/

        //alert($form.serialize());
        //console.log($form.serialize());
        console.log("le fichier est :" + $('#imageVolontaire').prop('files'));
//        var form = $('#formVolontaire')[0];
//        var data = new formData(form);
        var File1 = $('#imageVolontaire').prop('files');
        var File2 = $('#imagePieceVolontaire').prop('files');

//        var data = new FormData();
//        var tabVar = new Array($form.serialize());
//
//        data.append("ImageVolontaire", $('#imageVolontaire')[0].files[0] );
//        data.append("ImagePieceVolontaire", $('#imagePieceVolontaire')[0].files[0]);
//        data.append("donnees", tabVar);

        //alert($(':input').val());

        inseretData();
        if($('#gererCompte').attr('action') === "/inserer_Volontaire"){
            inseretFileData();
        }
    });

})

function inseretData() {

    /*$.ajaxSetup({
     headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
     });*/
    $.ajax({
        url: $('#gererCompte').attr('action'),
//          url: $('$form').attr('action'),
        type: 'POST',
        data: $('#gererCompte').serialize(),
        /*mimeType: "multipart/form-data",
         cache: false,
         contentType: false,
         processData: false,*/

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
                        if($('#formVolontaire').attr('action') === "/inserer_compte"){
                            addVolontaire();
                        }else{
                            window.location.href = '/listeComptes';
                        }
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

    })
}

function inseretFileData() {

    var File1 = $('#imageVolontaire').prop('files');
    var File2 = $('#imagePieceVolontaire').prop('files');

    var data = new FormData();
    data.append("ImageVolontaire", $('#imageVolontaire')[0].files[0]);
    data.append("ImagePieceVolontaire", $('#imagePieceVolontaire')[0].files[0]);


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({

//        url: $('#formVolontaire').attr('action'),
        url: '/FileVolontaire',
        type: 'POST',
        data: data,
        mimeType: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,

        success: function (data, textStatus, jqXHR) {

            //console.log(JSON.stringify(data));
            if (data == "succes") {

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "preventDuplicates": false,
                    "positionClass": "toast-top-left",
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
                        //addVolontaire();
                    }
                },
                    toastr.success('Enregistrement effectué avec succès', 'AJOUT DE FICHIERS');
            } else {

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "preventDuplicates": false,
                    "positionClass": "toast-top-left",
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
                    toastr.error('Echec de l\'enregistrement des fichier sur le serveur', 'AJOUT DE FICHIERS');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "progressBar": true,
                "preventDuplicates": false,
                "positionClass": "toast-top-left",
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
                toastr.warning('Un problème est survenue sur le serveurn contacter l\'administrateur', 'ALERTE');
        }

    })
}

function addVolontaire() {

    $.confirm({
        title: '<p style="color: #c40b4c"><Strong>ALERTE</strong></p>!',
        content: '<p style="color:#056365"> Voulez vous saisir un autre volontaire ?</p>',
        type: 'green',
        buttons: {
            confirm: {
                text: 'Saisir à nouveau',
                btnClass: 'btn-success',
                action: function () {
                    window.location.href = '';
                }
            },
            /*cancel: function () {
             $.alert('Canceled!');
             },*/
            cancel: {
                text: 'Annuler',
                btnClass: 'btn-blue',
                keys: ['enter', 'shift'],
                action: function () {
                    window.location.href = '/Liste_Volontaire';
                }
            }
        }
    });
}

function addTabHistorique() {

    $("#tabComite").append(
            "<tr>"
            + "<td>1</td>"
            + "<td>"
            + '<select class="select2">'
            + "<option>comité1</option>"
            + "<option>comité2</option>"
            + "<option>comité3</option>"
            + '</select>'
            + "</td>"
            + "<td>"
            + '<input type="date" class="form-control" placeholder="Entrez la date d entrée">'
            + '</td>'
            + '<td>'
            + '<input type="date" class="form-control" placeholder="Entrez la date de sortie">'
            + '</td>'
            + '</tr>'
            )
}

function hideZoneVilCommune() {


    if ($('#paysNaiss').val() != 'CIV') {

        $('.zoneVilCommune').hide();
//        $('#vilNaiss').prop('.disabled',true);
//        $('#comNaiss').prop('.disabled',true);
    } else {
        $('.zoneVilCommune').show();
//        $('#vilNaiss').prop('.disabled',false);
//        $('#comNaiss').prop('.disabled',false);
    }
}

function selectPiece(){

    if($('#paysNationalite').val()!='CIV'){
        $('#idTypepiece').val(4);
        $('.nationalite').val("CARTE CONSULAIRE");
    }
}

function activerZonePermis(){

    if(! $("#idAvoirPermis").is(':Checked')){
        $('#idnumeroPermis').val("");
        $('#idnumeroPermis').attr('disabled',true);
        $('#idcategoriePermis').attr('disabled',true);
    }else{
        $('#idnumeroPermis').attr('disabled',false);
        $('#idcategoriePermis').attr('disabled',false);
    }
}
