function init(){
	$("#user_form").on("submit",function(e){
		save_edit(e);
	});
}
function save_edit(e){
	e.preventDefault();
	var formData = new FormData($("#user_form")[0]);
	$.ajax({
		url: "../user/c_user.php?op=save",
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,
		success: function(data){
			if (data=="pass"){
				Swal.fire(
					'Wricor',
					'Error, las contraseñas no coinciden',
					'error'
				);
			} else if (data=="email"){
				Swal.fire(
					'Wricor',
					'La cuenta de correo electronico ya existe, intente recuperar su contraseña',
					'error'
				);
			} else {
				Swal.fire(
					'Wricor',
					'Se registro correctamente',
					'success'
				);
				var gene01correopers = $('#gene01correopers').val();
				$.post("../email/c_email.php?op=send_new", { gene01correopers: gene01correopers}, function(data){
				});
			}
			// $('#user_form')[0].reset();
		}
	}); 
}

init();
