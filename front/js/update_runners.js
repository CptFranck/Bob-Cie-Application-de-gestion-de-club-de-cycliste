'use strict';

var ligne = 0;
var mail_var = "";

function UpdateRunners(id) {
    var mail =  document.getElementById(id).name;
    ligne = id;
    ajaxRequest('GET', 'http://prj-cir2-web-api.monposte/php/request.php/get_runners?mail='+ mail, DisplayInputRunner);
    
}

function DisplayInputRunner (runner){
    var text = "";
    for(let i = 0; i < runner.length; i++){
        text += '<td><input maxlength="10" size="7" id="' + ligne + '_nom" type="text" value="'+ runner[i].nom + '"></td><td><input maxlength="10" size="7" id="' + ligne + '_prenom" type="text" value="' + runner[i].prenom + '"></td><td><input maxlength="10" size="7" id="' + ligne + '_date" placeholder="AAAA-MM-JJ" pattern=\'(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))\' type="text" value="'+ runner[i].date_naissance + '"></td><td>' + runner[i].categorie + '</td><td><input maxlength="10" size="7" id="' + ligne + '_licence" type="text" value="' + runner[i].num_licence + '"</td><td>' + runner[i].club + '</td><td>';
        text += '<select id="' + ligne + '_valide" class="form-control mx-sm-3" id="selection_utilisateur">';
        
        if(runner[i].valide == null){
            var valide = "";
            var nonvalide = "selected";
        } else {
            var valide ="selected";
            var nonvalide = "";
            
        }
        
        text += '<option value="1"' + valide +' > valide </option>';
        text += '<option value="null"' + nonvalide +' > non valide </option></section>';
        text += '</td><td><a id="' + ligne + '" onclick="SaveRunners(this.id)" name="' + runner[i].mail + '"href=#><i class="fa fa-save fa-2x"></i></a></td>';
    }
    $('#' + ligne+ "_tr").html(text);
}

function SaveRunners(id) {
    ligne = id;
    var nom =       document.getElementById(id + "_nom").value;
    var prenom =    document.getElementById(id + "_prenom").value;
    var date =      document.getElementById(id + "_date").value;
    var licence =   document.getElementById(id + "_licence").value;
    var valide =    document.getElementById(id + "_valide").value;
    var mail =      document.getElementById(id).name;
    ligne = id;
    mail_var = mail;
    ajaxRequest('POST', 'http://prj-cir2-web-api.monposte/php/request.php/post_runner?mail='+ mail +'&nom='+ nom +'&prenom='+ prenom + '&date='+ date +'&licence='+ licence +'&valide='+ valide, LoadRunner);
    
}

function LoadRunner(){
    ajaxRequest('GET', 'http://prj-cir2-web-api.monposte/php/request.php/get_runners?mail='+ mail_var, DisplayUpdateRunner);
}

function DisplayUpdateRunner(runner){
    var text = "";
    var valide;
    for(let i = 0; i < runner.length; i++){
        if(runner[i].valide == 1){
            valide = "valide";
        } else {
            valide = "non valide";
        }
        text += '<td>'+ runner[i].nom +'</td><td>' + runner[i].prenom + '</td><td>' + runner[i].date_naissance + '</td><td>' + runner[i].categorie + '</td><td>' + runner[i].num_licence + '</td><td>' + runner[i].club + '</td><td>'+ valide +'<td><a id="' + ligne + '" onclick="UpdateRunners(this.id)" name="' + runner[i].mail + '"href=#><i class="fas fa-cogs fa-2x"></i></a><br><a id="' + i + '" onclick="Suscribe(this.id)" name="' + runner[i].mail + '"href="run.html"><i class="fas fa fa-bicycle fa-2x"></i></a></td>';
    }
    $('#' + ligne+ "_tr").html(text);
}