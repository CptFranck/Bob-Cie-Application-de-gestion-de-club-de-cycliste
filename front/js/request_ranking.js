'use strict';

ajaxRequest('GET', 'http://prj-cir2-web-api.monposte/php/request.php/select_run', DisplayRuns);

function DisplayRuns(runs){
    for(let i = 0; i < runs.length; i++){        
        $('#run').append('<option value="' + runs[i].id + '">' + runs[i].libelle + '</option>');        
    }
    var id =  document.getElementById("run").value;
    if (id != ""){
        ajaxRequest('GET', 'http://prj-cir2-web-api.monposte/php/request.php/select_ranking?id='+ id, DisplayRunnerRanking);
    }
}

function DisplayRunnerRanking(runner){
    for(let i = 0; i < runner.length; i++){
        if(runner[i].place == 1){
            var timeref = new Date('2000-01-01T' + runner[i].temps);
            var calcul = timeref.getHours()*3600 + timeref.getMinutes()*60 + timeref.getSeconds();
            calcul = calcul / 3600;
            var avr_speed = runner[i].distance / calcul;
            $('#tableau_coureurs').append('<tr><td><b>' + runner[i].place + '</b></td><td>' + runner[i].nom + '</td><td >' + runner[i].prenom + '</td><td>' + runner[i].dossart + '</td><td>' + runner[i].num_licence + '</td><td>' + runner[i].categorie + '</td><td>' + runner[i].categorie_categorie_valeur + '</td><td>' + runner[i].club + '</td><td>' + runner[i].temps + '</td><td>' + runner[i].point + '</td><td>' + avr_speed.toFixed(2) + ' km/h</td></tr>');
        }
        else{
            var timesup = new Date('2000-01-01T' + runner[i].temps);
            var hoursup = timesup.getHours() - timeref.getHours();
            var minsup = timesup.getMinutes() - timeref.getMinutes();
            var secsup = timesup.getSeconds() - timeref.getSeconds();
            $('#tableau_coureurs').append('<tr><td><b>' + runner[i].place + '</b></td><td>' + runner[i].nom + '</td><td >' + runner[i].prenom + '</td><td>' + runner[i].dossart + '</td><td>' + runner[i].num_licence + '</td><td>' + runner[i].categorie + '</td><td>' + runner[i].categorie_categorie_valeur + '</td><td>' + runner[i].club + '</td><td> +' + hoursup + ':' + minsup + ':' + secsup + '</td><td>' + runner[i].point + '</td></tr>');
        }
    }
}

function printRanking(){
    var printContent = document.getElementById('print');
    var print = window.open('', '', 'width=900,height=650');
    print.document.write(printContent.innerHTML);
    print.document.close();
    print.focus();
    print.print();
}