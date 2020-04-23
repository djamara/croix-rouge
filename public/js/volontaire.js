$(function () {

    /*$.niftyNoty({
     type: 'success',
     container: 'floating',
     title: 'DONNEES  ENREGISTRÉES',
     message: "L'enregistrement a été effectué avec succès",
     closeBtn: true,
     timer: 0
     });*/


   //addVolontaire();

//    $.notify("Hello World");
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

    hideZoneVilCommune();

    $('#formVolontaire').bootstrapValidator({

        message: 'This value is not valid',
        live: 'enabled',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {

            nomVolontaire: {
                message: 'Veuillez svp saisir le nom',
                feedbackIcons: true,
                trigger: 'keyup',
                validators: {
                    notEmpty: {
                        message: 'Veuillez svp saisir le nom'
                    },
                    /*regexp: {
                     regexp: /^[a-zA-Z0-9_]+$/,
                     message: 'The username can only consist of alphabetical, number and underscore'
                     }*/
                }
            },
            prenomVolontaire: {
                message: 'Veuillez svp saisir le prenom',
                feedbackIcons: true,
                trigger: 'keyup',
                validators: {
                    notEmpty: {
                        message: 'Veuillez svp saisir le prenom'
                    }
                    /*regexp: {
                     regexp: /^[a-zA-Z0-9_]+$/,
                     message: 'The username can only consist of alphabetical, number and underscore'
                     }*/
                }
            },
            dateNaissVolontaire: {
                message: 'Veuillez svp saisir la date de naissance',
                feedbackIcons: true,
                trigger: 'keyup',
                validators: {
                    notEmpty: {
                        message: 'Veuillez svp saisir la date de naissance'
                    }
                }
            },
            numPieceVolontaire: {
                message: 'Veuillez svp saisir le numero de la pièce',
                feedbackIcons: true,
                trigger: 'keyup',
                validators: {
                    notEmpty: {
                        message: 'Veuillez svp saisir le numero de la pièce'
                    }
                }
            },
            tel1Volontaire: {
                message: 'Veuillez svp saisir le numero de la pièce',
                feedbackIcons: true,
                trigger: 'keyup',
                validators: {
                    notEmpty: {
                        message: 'Veuillez svp saisir le numero de la pièce'
                    }
                }
            },
            nomPersUrgence: {
                message: "Veuillez svp saisir le nom du contact d'urgence",
                feedbackIcons: true,
                trigger: 'keyup',
                validators: {
                    notEmpty: {
                        message: "Veuillez svp saisir le nom du contact d'urgence"
                    }
                }
            },
            prenomPersUrgence: {
                message: "Veuillez svp saisir le prenom du contact d'urgence",
                feedbackIcons: true,
                trigger: 'keyup',
                validators: {
                    notEmpty: {
                        message: "Veuillez svp saisir le prenom du contact d'urgence"
                    }
                }
            },
            telPersUrgence: {
                message: "Veuillez svp saisir le contact de la personne d'urgence",
                feedbackIcons: true,
                trigger: 'keyup',
                validators: {
                    notEmpty: {
                        message: "Veuillez svp saisir le contact de la personne d'urgence"
                    }
                }
            },
            /*imageVolontaire: {
                message: "Veuillez svp joindre le contact de la personne d'urgence",
                feedbackIcons: true,
                trigger: 'keyup',
                validators: {
                    notEmpty: {
                        message: "Veuillez svp saisir le contact de la personne d'urgence"
                    }
                }
            }*/



            /*qualifVolontaire:{
             message:'Veuillez svp saisir la qualification volontaire',
             feedbackIcons: true,
             trigger: 'keyup',
             validators:{
             notEmpty: {
             message: 'Veuillez svp saisir le numero de la pièce'
             }
             }
             }*/
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
        $.ajax({
            url: $form.attr('action'),
            data: $form.serialize(),
            type: 'POST',

            success: function (data, textStatus, jqXHR) {

                console.log(JSON.stringify(data));
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
                            addVolontaire();
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
                            toastr.warning('Have fun storming the castle!', 'Miracle Max Says');
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
                        toastr.warning('Un problème est survenue sur le serveurn contacter l\'administrateur', 'ALERTE');

            }

        })
    });
    ;

})

function addVolontaire(){
    
     $.confirm({
        title: '<p style="color: #c40b4c"><Strong>ALERTE</strong></p>!',
        content: '<p style="color:#056365"> Voulez vous saisir un autre volontaire ?</p>',
        type:'green',
        buttons: {
            confirm: {
                    text:'Saisir à nouveau',
                    btnClass:'btn-success',
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