<?php
/**
 **********************************************************************
 * @author William Jammirlhey Rico Ruiz <webmaster@williamrico.com>
 * @date Thursday, February 24, 2022
 * @file external/index.php
 * @version 0.1
 ***********************************************************************/
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Recuperar mi Contraseña</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="../tools/admin/all.min.css">
	<link rel="stylesheet" href="../tools/admin/icheck-bootstrap.min.css">
	<link rel="stylesheet" href="../tools/admin/adminlte.min.css">
</head>

<body class="hold-transition login-page background-2">
	<div class="login-box">
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="index.php" class="h1"><b>W</b>ricor</a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">¿Perdiste tu contraseña? No te preocupes, te ayudaremos</p>
				<form method="post" id="user_form">
					<div class="input-group mb-3">
						<input type="email" class="form-control" id="gene01correopers" name="gene01correopers" placeholder="Correo Electrónico">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="button" class="btn btn-primary btn-block" id="btnrecover">Enviar Correo</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
				<p class="mt-3 mb-1">
					<a href="index.php">Ingresar</a>
				</p>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="../tools/admin/jquery.min.js"></script>
	<script src="../tools/admin/bootstrap.bundle.min.js"></script>
	<script src="../tools/admin/adminlte.min.js"></script>
	<script src="../tools/admin/sweetalert2@11.js"></script>
	<script type="text/javascript" src="recoverpass.js"></script>
</body>

</html>