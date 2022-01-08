'use strict';

function Suscribe(){
    document.getElementById("Run").disabled = true;
    document.getElementById("ValidButton").style.display = "initial";
    document.getElementById("Runners").style.display = "initial";
    document.getElementById("Flag").value = null;
    var run = document.getElementById("Run").value;
    ajaxRequest('GET', 'http://prj-cir2-web-api.monposte/php/request.php/select_runners_not_present?course=' + run, DisplayRunnerNotPresent);
}

function DisplayRunnerNotPresent(runner){
    for(let i = 0; i < runner.length; i++){        
        $('#Runner').append('<option value="' + runner[i].mail + '">' + runner[i].nom + " " + runner[i].prenom + " " + runner[i].num_licence + '</option>');        
    }
}

function Valid(){
    var run = document.getElementById("Run").value;
    ajaxRequest('GET', 'http://prj-cir2-web-api.monposte/php/request.php/select_flag_present?course=' + run, CheckNewFlag);
}

function CheckNewFlag(flags){
    var dossart = document.getElementById("Flag").value;
    var re = new RegExp("^([0-9]{1,3})$");
    if (dossart == "" || !re.test(dossart)){
        document.getElementById("Alert").style.display = "initial";
        return null;
    }
    for(let i = 0; i < flags.length; i++){        
        if (flags[i].dossart == dossart) {
            document.getElementById("Alert").style.display = "initial";
            return null;
        }
    }
    document.getElementById("Alert").style.display = "none";

    var mail = document.getElementById("Runner").value;
    var run = document.getElementById("Run").value;

    ajaxRequest('POST', 'http://prj-cir2-web-api.monposte/php/request.php/insert_new_runner?course=' + run + '&mail=' + mail + '&dossart=' + dossart, UpdateForNewRunner);
}

function UpdateForNewRunner(){
    var mail = document.getElementById("Runner").value;
    document.getElementById("Run").disabled = false;
    document.getElementById("ValidButton").style.display = "none";
    document.getElementById("Runners").style.display = "none";

    ajaxRequest('GET', 'http://prj-cir2-web-api.monposte/php/request.php/get_runners?mail='+ mail, DisplayUpdateRunnerInRun);
}

function DisplayUpdateRunnerInRun(runner){

    var dossart = document.getElementById("Flag").value;
    for(let i = 0; i < runner.length; i++){
        $('#tableau_coureurs').append('<tr><td>' + runner[i].nom + '</td><td >' + runner[i].prenom + '</td><td>' + dossart + '</td></tr>');
    }
    document.getElementById("Flag").value = null;
}

function Annul(){
    document.getElementById("Run").disabled = false;
    document.getElementById("ValidButton").style.display = "none";
    document.getElementById("Runners").style.display = "none";
    document.getElementById("Flag").value = null;
}
