<?php
/**
**********************************************************************
* @author William Jammirlhey Rico Ruiz <webmaster@williamrico.com>
 * @date Monday, February 28, 2021
 * @file application/index.php
 * @version 0.1
***********************************************************************/
date_default_timezone_set('America/Bogota');
require '../config/app.php';
require $App->libs.'lib_base.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Crear Cuenta</title>
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="../tools/admin/all.min.css">
	<link rel="stylesheet" href="../tools/admin/icheck-bootstrap.min.css">
	<link rel="stylesheet" href="../tools/admin/adminlte.min.css">
	<link rel="stylesheet" href="../tools/admin/tempusdominus-bootstrap-4.min.css">
	<!-- <link rel="stylesheet" href="../tools/admin/tempus-dominus.css"> -->
</head>

<body class="hold-transition register-page background-3">
	<div class="register-box">
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="index.php" class="h1"><b>W</b>ricor</a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Crear Cuenta Nueva</p>

				<form method="post" id="user_form">
					<div class="row mb-3">
						<div class="col md-6">
							<select class="form-control" id="gene01tipodoc" name="gene01tipodoc" required>
								<option class="hidden" selected disabled>Tipo de Documento</option>
								<option value="RC">RC - Registro Civil</option>
								<option value="TI">TI - Tarjeta de identidad</option>
								<option value="CC">CC - Cédula de ciudadanía</option>
								<option value="CE">CE - Cédula de extranjería</option>
								<option value="PA">PA - Pasaporte</option>
							</select>
						</div>
						<div class="col md-6">
							<input type="text" class="form-control" id="gene01doc" name="gene01doc" placeholder="Número de Documento" required>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col md-6">
							<input type="text" class="form-control" id="gene01nombre1" name="gene01nombre1" placeholder="Primer nombre" required>
						</div>
						<div class="col md-6">
							<input type="text" class="form-control" id="gene01nombre2" name="gene01nombre2" placeholder="Segundo Nombre" required>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col md-6">
							<input type="text" class="form-control" id="gene01apellido1" name="gene01apellido1" placeholder="Primer Apellido" required>
						</div>
						<div class="col md-6">
							<input type="text" class="form-control" id="gene01apellido2" name="gene01apellido2" placeholder="Segundo Apellido" required>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col md-12">
							<div class="input-group date" id="fecha" data-target-input="nearest">
								<input type="text" class="form-control datetimepicker-input" data-target="#fecha" id="gene01fechanaci" name="gene01fechanaci" placeholder="Fecha de Nacimiento" required/>
								<div class="input-group-append" data-target="#fecha" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar"></i></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col md-12">
							<input type="text" class="form-control" id="gene01direccion" name="gene01direccion" placeholder="Dirección" required>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col md-12">
							<input type="email" class="form-control" id="gene01correoinst" name="gene01correoinst" placeholder="Correo Electrónico Institucional">
						</div>
					</div>
					<div class="row mb-3">
						<div class="col md-12">
							<input type="email" class="form-control" id="gene01correopers" name="gene01correopers" placeholder="Correo Electrónico Personal" required>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-12">
							<input type="password" class="form-control" id="gene01clave1" name="gene01clave1" placeholder="Contraseña" required>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-12">
							<input type="password" class="form-control" id="gene01clave2" name="gene01clave2" placeholder="Confirmación de Contraseña" required>
						</div>
					</div>

					<div class="row">
						<!-- /.col -->
						<div class="hidden-group">
							<input type="hidden" id="gene01fecha" name="gene01fecha" value="<?php echo date('Ymd') ?>">
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-primary btn-block">Crear Cuenta</button>
						</div>
						<!-- /.col -->
					</div>
				</form>

				<a href="index.php" class="text-center">Ingresar</a>
			</div>
			<!-- /.form-box -->
		</div><!-- /.card -->
	</div>
	<!-- /.register-box -->

	<script src="../tools/admin/jquery.min.js"></script>
	<script src="../tools/admin/bootstrap.bundle.min.js"></script>
	<script src="../tools/admin/moment.min.js"></script>
	<script src="../tools/admin/tempusdominus-bootstrap-4.min.js"></script>
	<script src="../tools/admin/adminlte.min.js"></script>
	<script src="../tools/admin/sweetalert2@11.js"></script>
	<script type="text/javascript" src="signup.js"></script>
	<script type="text/javascript">
		$(function () {
			$('#fecha').datetimepicker({
				format: 'DD-MM-YYYY'
			});
		});
	</script>
</body>

</html>