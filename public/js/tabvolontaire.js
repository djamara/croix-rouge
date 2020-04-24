/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function(){
    
    //alert("bonjour");
    selectRow();
})

function selectRow(){
    
    $('#tbodyTabVolont tr').click(function(){
        
//        $(this).css("background-color","red");

        $('#tbodyTabVolont tr').css("background-color","");
        $(this).css("background-color","red");
        alert($('this #immatVol'));
    })
}