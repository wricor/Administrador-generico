function init(){    
}

$(document).ready(function() {
});

$(document).on("click","#btnrecover", function(){
    var gene01correopers = $('#gene01correopers').val();
    if(gene01correopers ==""){
        Swal.fire(
            'Wricor',
            'Error, el campo está vacío',
            'error'
        );
    }else{ 
        $.post("../user/c_user.php?op=email", {gene01correopers : gene01correopers}, function(data){
            if (!data){
                Swal.fire(
                    'Wricor',
                    'El usuario no se encuentra registrado',
                    'error'
                );
            } else {
                $.post("../email/c_email.php?op=send_recover", {gene01correopers : gene01correopers}, function(data){
                    $('#gene01correopers').val('');
                });
                Swal.fire(
                    'Wricor',
                    'El correo ha sido enviado',
                    'success'
                );
            }
        });
    }
});

init();