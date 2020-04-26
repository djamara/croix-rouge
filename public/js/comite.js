/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){
    
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

    
    //alert("bonjour le jour");
    
      $('#formComite').bootstrapValidator({

        message: 'This value is not valid',
        live: 'enabled',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {

            nomComite: {
                message: 'Veuillez svp saisir le nom du comité local',
                feedbackIcons: true,
                trigger: 'keyup',
                validators: {
                    notEmpty: {
                        message: 'Veuillez svp saisir le nom comité local'
                    },
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
        
    });
})


function validerformulaire(){
    
    $.ajax({
        
        url : $("#formComite").attr("action"),
        data: $("#formComite").serialize(),
        success: function (data, textStatus, jqXHR){
            alert();
        },
        error:function (jqXHR, textStatus, errorThrown){
            
        }
    })
}