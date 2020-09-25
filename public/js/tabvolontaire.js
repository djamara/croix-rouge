/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function(){
    
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

function selectRow(){
    
    /*$('#tbodyTabVolont tr').click(function(){
        
//        $(this).css("background-color","red");

        $('#tbodyTabVolont tr').css("background-color","");
        $(this).css("background-color","red");
        alert($('this #immatVol'));
    })*/
}


function addVolontaire(persnumat) {

    $.confirm({
//        title: '<p style="color: #c40b4c"><Strong>ALERTE</strong></p>!',
//        content: '<p style="color:#056365"> Voulez vous saisir un autre volontaire ?</p>',
        type: 'red',
        title: 'ALERTE',
        content:'Voulez vous vraiment supprimer ce volontaire ?',
        icon: 'fa fa-warning',
        theme:'modern',
        buttons: {
            confirm: {
                text: 'OUI',
                btnClass: 'btn-danger',
                action: function () {
                    alert(persnumat);
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