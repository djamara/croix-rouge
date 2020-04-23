/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {

//    alert("bonjour");

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

    toastr.success('Bienvenue dans eCROIX-ROUGE', 'BIENVENUE'); //le test du plugin de l'alerte

    $('#login-nav').bootstrapValidator({
        
        message: 'This value is not valid',
        live: 'enabled',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fiels:{
            login: {
                    message: 'Veuillez svp saisir le login',
                    feedbackIcons: true,
                    trigger: 'keyup',
                    validators: {
                        notEmpty: {
                            message: 'Veuillez svp saisir le login'
                        },
                        /*regexp: {
                         regexp: /^[a-zA-Z0-9_]+$/,
                         message: 'The username can only consist of alphabetical, number and underscore'
                         }*/
                    }
                }
        }
    }).on('success.form.bv',function(e){
        
        // Prevent form submission
        e.preventDefault();
        
        //le traitement ajax
        login();
    })
})

function login(){
    
    $.ajax({
        
        url: $('#login-nav').attr('action'),
        data: $('#login-nav').serialize(),
        type: 'POST',
        
        success: function (data, textStatus, jqXHR) {
            
            if(data == 'pasdedonnees'){
                
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
                             //window.location.href = '/';
                        }
                    },
                      toastr.warning('Données sont incorrectes ! Accès refusé ', 'VERIFICATION DES DONNÉES'); 
            }
            else{
                
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
                            window.location.href = '/admin';
                        }
                    },
                      toastr.success('Données sont correctes ! Accès accordé ', 'VERIFICATION DES DONNÉES');
            
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
                      toastr.error("Un problème est survenue au niveau du serveur\n\
                                    Veuillez contacter l'administrateur", 'VERIFICATION DES DONNÉES');
        }
    })
}