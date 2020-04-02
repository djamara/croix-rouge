$(function () {

    //alert("Bonjour Mr");

})

function addTabHistorique() {

    $("#tabComite").append(
        "<tr>"
            +"<td>1</td>"
            +"<td>"
                +'<select class="select2">'
                    +"<option>comité1</option>"
                    +"<option>comité2</option>"
                    +"<option>comité3</option>"
                +'</select>'
            +"</td>"
            +"<td>"
                +'<input type="date" class="form-control" placeholder="Entrez la date d entrée">'
            +'</td>'
            +'<td>'
                +'<input type="date" class="form-control" placeholder="Entrez la date de sortie">'
            +'</td>'
        +'</tr>'
    )
}