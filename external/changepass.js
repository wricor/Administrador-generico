function init(){    
}

$(document).ready(function(){
    var gene01correopers = $('#gene01correopers').val();
    var gene01token = $('#gene01token').val();
    if(gene01correopers!='' && gene01token!=''){
        $.post("../change/c_change.php?op=verify_token", {gene01correopers : gene01correopers, gene01token : gene01token}, function(data){
            if (data=='Pasa'){
                Swal.fire(
                    'Wricor',
                    'Incluya la nueva contraseña',
                    'success'
                );
            } else {
                Swal.fire(
                    'Wricor',
                    'No se encontró una solicitúd para el usuario',
                    'error'
                ).then(function() {
					window.location.replace('index.php');
				});
            }
        });
    } else {
        Swal.fire(
            'Wricor',
            'Error, algún campo está vacío',
            'error'
        );
    }
});

$(document).on("click","#btnchange", function(){
    var gene01correopers = $('#gene01correopers').val();
    var gene01clave1 = $('#gene01clave1').val();
    var gene01clave2 = $('#gene01clave2').val();
    if(gene01clave1 =='' || gene01clave2 == ''){
        Swal.fire(
            'Wricor',
            'Error, los campos no pueden estar vacíos',
            'error'
        );
    } else { 
        if(gene01clave1 != gene01clave2){
            Swal.fire(
                'Wricor',
                'Error, las contraseñas no son iguales',
                'error'
            );
        } else {
            $.post("../change/c_change.php?op=change_password", {gene01clave1 : gene01clave1, gene01correopers : gene01correopers}, function(data){
                Swal.fire(
                    'Wricor',
                    'La contraseña ha sido cambiada',
                    'success'
                );
            });
        }
        $('#user_form')[0].reset();
    }
});

init();