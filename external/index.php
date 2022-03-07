<?php
/**
**********************************************************************
* @author William Jammirlhey Rico Ruiz <webmaster@williamrico.com>
 * @date Thursday, February 24, 2022
 * @file external/index.php
 * @version 0.1
***********************************************************************/
require '../config/conection.php';
if(isset($_POST["send"]) && $_POST["send"]=="si"){
    require '../user/m_user.php';
    $user = new User();
    $user->login();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inicio</title>
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="../tools/admin/all.min.css">
	<link rel="stylesheet" href="../tools/admin/icheck-bootstrap.min.css">
	<link rel="stylesheet" href="../tools/admin/adminlte.min.css">
</head>

<body class="hold-transition login-page background-1">
	<div class="login-box">
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="index.php" class="h1"><b>W</b>ricor</a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">¡Bienvenido! Por favor ingrese</p>
					<?php
						if (isset($_GET["m"])){
							switch($_GET["m"]){
								case "1";
					?>
						<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<div class="d-flex align-items-center justify-content-start">
								<i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
								<span> El Usuario y/o Contraseña son incorrectos. </span>
							</div>
						</div>
					<?php
								break;
							case "2";
					?>
						<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<div class="d-flex align-items-center justify-content-start">
								<i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
								<span> Los campos estan vacios.</span>
							</div>
						</div>
					<?php
								break;
							}
						}
					?>
				<form action="" method="post" id="login">
					<div class="input-group mb-3">
						<input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
								<input type="checkbox" id="remember">
								<label for="remember">Recordarme</label>
							</div>
						</div>
						<div class="col-4">
							<input type="hidden" name="send" class="form-control" value="si">
							<button type="submit" class="btn btn-primary btn-block">Ingresar</button>
						</div>
					</div>
				</form>
				<p class="mb-1">
					<a href="reminder.php">Perdí mi Contraseña</a>
				</p>
				<p class="mb-0">
					<a href="signup.php" class="text-center">Crear Cuenta</a>
				</p>
			</div>
		</div>
	</div>
	<script src="../tools/admin/jquery.min.js"></script>
	<script src="../tools/admin/bootstrap.bundle.min.js"></script>
	<script src="../tools/admin/adminlte.min.js"></script>
</body>

</html>