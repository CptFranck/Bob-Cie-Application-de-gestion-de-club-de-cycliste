'use strict';

ajaxRequest('GET', 'http://prj-cir2-web-api.monposte/php/request.php/select_user', DisplayUsers);
                //'http://prj-cir2-web-api.monposte/php/request.php/liste_coureur'

function DisplayUsers(users){
    for(let i = 0; i < users.length; i++)
    $('#selection_utilisateur').append('<option value="' + users[i].id + '">' + users[i].nom + '</option>');
}