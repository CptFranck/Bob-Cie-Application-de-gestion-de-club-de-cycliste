'use strict';

ajaxRequest('GET', 'http://prj-cir2-web-api.monposte/php/request.php/select_runners', DisplayRunners);

function DisplayRunners(runners){
    for(let i = 0; i < runners.length; i++){
        var valide;
        if(runners[i].valide == 1){
            valide = "valide";
        } else {
            valide = "non valide";
        }
        $('#tableau_coureurs').append('<tr id="' + i + '_tr"><td>' + runners[i].nom + '</td><td >' + runners[i].prenom + '</td><td>' + runners[i].date_naissance + '</td><td>' + runners[i].categorie + '</td><td>' + runners[i].num_licence + '</td><td>' + runners[i].club + '</td><td>' + valide + '</td><td><a id="' + i + '" onclick="UpdateRunners(this.id)" name="' + runners[i].mail + '"href=#><i class="fas fa-cogs fa-2x"></i></a><br><a id="' + i + '" name="' + runners[i].mail + '"href="run.html"><i class="fas fa fa-bicycle fa-2x"></i></a></td></tr>');
    }
}