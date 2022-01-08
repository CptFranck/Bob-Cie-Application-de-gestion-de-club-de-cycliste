'use strict';

function ajaxRequest(type, url, callback, data = null){

    let xhr = new XMLHttpRequest();
    xhr.open(type,url);

    // Add onload function.
    xhr.onload = () => {
    
        switch (xhr.status) {
    
            case 200:
    
            case 201: 
                
                console.log(xhr.responseText);
                callback(JSON.parse(xhr.responseText));
                break;
    
            default: console.log('HTTP error:'+ xhr.status);
        }
    };

    // Send XML HTTP request.
    xhr.send(data);

}

function httpErrors(erroCode){
let message= {
    400: 'requête incorrecte',
    401:'Authentifiez vous',
    403:'Accés refusé',
    404:'Page non trouvée',
    500:'Erreue interne du serveur',
    503:'Service indisponible'

};
$('#errors').html('<i class="fa fa-exclamation-circle"></i><strong>' + message[erroCode] + '</strong>');
$('errors').show();
}
