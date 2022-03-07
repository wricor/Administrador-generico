<?php

/**
 **********************************************************************
 * @author William Jammirlhey Rico Ruiz <webmaster@williamrico.com>
 * @date Thursday, February 24, 2022
 * @file change_pass.php
 * @version 0.1
 ***********************************************************************/
if (empty($_GET['gene01correopers'])) {
	header('Location: index.php');
}
if (empty($_GET['gene01token'])) {
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cambio de Contraseña</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="../tools/admin/all.min.css">
	<link rel="stylesheet" href="../tools/admin/icheck-bootstrap.min.css">
	<link rel="stylesheet" href="../tools/admin/adminlte.min.css">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="index.php" class="h1"><b>W</b>ricor</a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Registro de contraseña. Por favor, ingresa tu nueva contraseña</p>
				<form method="post" id="user_form">
					<div>
						<input type="hidden" id="gene01correopers" class="form-control" value=<?php echo $_GET['gene01correopers'] ?>>
						<input type="hidden" id="gene01token" class="form-control" value=<?php echo $_GET['gene01token'] ?>>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" id="gene01clave1" name="gene01clave1" placeholder="Nueva Contraseña">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" id="gene01clave2" name="gene01clave2" placeholder="Confirmar Contraseña">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="button" class="btn btn-primary btn-block" id="btnchange">Registrar Contraseña</button>
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
        <script type="text/javascript" src="changepass.js"></script>
</body>

</html>