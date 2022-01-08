'use strict';

ajaxRequest('GET', 'http://prj-cir2-web-api.monposte/php/request.php/select_run', DisplayRuns);

function DisplayRuns(runs){
    for(let i = 0; i < runs.length; i++){        
        $('#Run').append('<option value="' + runs[i].id + '">' + runs[i].libelle + '</option>');        
    }
    var id =  document.getElementById("Run").value;
    if (id != ""){
        ajaxRequest('GET', 'http://prj-cir2-web-api.monposte/php/request.php/select_runner?id='+ id, DisplayRunner);
    }
}

function DisplayRunner(runner){
    
    for(let i = 0; i < runner.length; i++){
        $('#tableau_coureurs').append('<tr><td>' + runner[i].nom + '</td><td >' + runner[i].prenom + '</td><td>' + runner[i].dossart + '</td></tr>');
    }
}